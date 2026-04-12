document.addEventListener('DOMContentLoaded', function() {
    const hoje = new Date().toISOString().split('T')[0];
    const campoData = document.getElementById('data');
    if (campoData) {
        campoData.setAttribute('min', hoje);
    }
    
    const textarea = document.getElementById('mensagem');
    const contador = document.getElementById('contadorCaracteres');
    
    if (textarea && contador) {
        textarea.addEventListener('input', function() {
            contador.textContent = this.value.length;
            contador.style.color = this.value.length > 450 ? '#dc3545' : '#666';
        });
    }
    
    const telefone = document.getElementById('telefone');
    if (telefone) {
        telefone.addEventListener('input', formatarTelefone);
    }
    
    const campos = ['nome', 'email', 'telefone', 'assunto', 'mensagem'];
    campos.forEach(campo => {
        const elemento = document.getElementById(campo);
        if (elemento) {
            elemento.addEventListener('input', function() {
                validarCampo(campo);
            });
        }
    });
});

function formatarTelefone(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length >= 11) {
        value = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
    } else if (value.length >= 7) {
        value = value.replace(/(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
    } else if (value.length >= 3) {
        value = value.replace(/(\d{2})(\d{0,5})/, '($1) $2');
    }
    e.target.value = value;
}

function validarCampo(campoId) {
    const campo = document.getElementById(campoId);
    if (!campo) return true;
    
    const valor = campo.value.trim();
    let valido = true;
    
    switch(campoId) {
        case 'nome':
            valido = valor.length >= 3;
            break;
        case 'email':
            valido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(valor);
            break;
        case 'telefone':
            const numeros = valor.replace(/\D/g, '');
            valido = numeros.length >= 10;
            break;
        case 'assunto':
            valido = valor !== '';
            break;
        case 'mensagem':
            valido = valor.length >= 10;
            break;
    }
    
    if (valido) {
        campo.classList.remove('campo-invalido');
        campo.classList.add('campo-valido');
    } else {
        campo.classList.remove('campo-valido');
        campo.classList.add('campo-invalido');
    }
    
    return valido;
}

function processarFormulario(event) {
    event.preventDefault();
    
    const campos = ['nome', 'email', 'telefone', 'assunto', 'mensagem'];
    let todosValidos = true;
    const erros = [];
    
    campos.forEach(campo => {
        if (!validarCampo(campo)) {
            todosValidos = false;
            
            switch(campo) {
                case 'nome':
                    erros.push('Nome deve ter pelo menos 3 caracteres');
                    break;
                case 'email':
                    erros.push('Email inválido');
                    break;
                case 'telefone':
                    erros.push('Telefone deve ter pelo menos 10 dígitos');
                    break;
                case 'assunto':
                    erros.push('Selecione um assunto');
                    break;
                case 'mensagem':
                    erros.push('Mensagem deve ter pelo menos 10 caracteres');
                    break;
            }
        }
    });
    
    const data = document.getElementById('data').value;
    if (data) {
        const dataObj = new Date(data);
        const hoje = new Date();
        hoje.setHours(0, 0, 0, 0);
        
        if (dataObj < hoje) {
            todosValidos = false;
            erros.push('A data não pode ser no passado');
            document.getElementById('data').classList.add('campo-invalido');
        }
    }
    
    const erroDiv = document.getElementById('erroValidacao');
    
    if (!todosValidos) {
        erroDiv.style.display = 'block';
        erroDiv.innerHTML = '<strong>❌ Corrija os seguintes erros:</strong><ul style="margin-top: 10px;">' + 
            erros.map(erro => '<li>' + erro + '</li>').join('') + '</ul>';
        return false;
    }
    
    erroDiv.style.display = 'none';
    
    const dados = {
        nome: document.getElementById('nome').value,
        email: document.getElementById('email').value,
        telefone: document.getElementById('telefone').value,
        assunto: document.getElementById('assunto').value,
        pessoas: document.getElementById('pessoas').value || 'Não informado',
        data: document.getElementById('data').value || 'Não informada',
        mensagem: document.getElementById('mensagem').value,
        data_envio: new Date().toLocaleString('pt-BR')
    };
    
    const assuntoFormatado = {
        'reserva': 'Fazer Reserva',
        'eventos': 'Eventos e Festas',
        'duvida': 'Dúvidas',
        'sugestao': 'Sugestão',
        'reclamacao': 'Reclamação',
        'outro': 'Outro'
    }[dados.assunto] || dados.assunto;
    
    const modalHTML = `
        <div class="dado-item">
            <strong>Nome:</strong> ${dados.nome}
        </div>
        <div class="dado-item">
            <strong>Email:</strong> ${dados.email}
        </div>
        <div class="dado-item">
            <strong>Telefone:</strong> ${dados.telefone}
        </div>
        <div class="dado-item">
            <strong>Assunto:</strong> ${assuntoFormatado}
        </div>
        <div class="dado-item">
            <strong>Pessoas:</strong> ${dados.pessoas}
        </div>
        <div class="dado-item">
            <strong>Data desejada:</strong> ${dados.data === 'Não informada' ? dados.data : new Date(dados.data).toLocaleDateString('pt-BR')}
        </div>
        <div class="dado-item">
            <strong>Mensagem:</strong><br>
            <em>"${dados.mensagem}"</em>
        </div>
        <div class="dado-item">
            <strong>Enviado em:</strong> ${dados.data_envio}
        </div>
    `;
    
    document.getElementById('dadosModal').innerHTML = modalHTML;
    
    const contatos = JSON.parse(localStorage.getItem('contatos_saborbrasa') || '[]');
    contatos.push(dados);
    localStorage.setItem('contatos_saborbrasa', JSON.stringify(contatos));
    
    document.getElementById('modalConfirmacao').style.display = 'flex';
    
    return false;
}

function fecharModal() {
    document.getElementById('modalConfirmacao').style.display = 'none';
}

window.onclick = function(event) {
    const modal = document.getElementById('modalConfirmacao');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
}

function preencherDadosTeste() {
    document.getElementById('nome').value = 'Alana','Kelly','Monique', 'Giovanna';
    document.getElementById('email').value = 'alana1@gmail.com', 'kelly2@gmail.com', 'monique303@gmail.com', 'giovanna4@gmail.com';
    document.getElementById('telefone').value = '(21) 9999-010101', '(21) 9999-020202', '(21) 9999-030303', '(21) 9999-040404';
    document.getElementById('assunto').value = 'Sugestão','Reserva','Eventos','Dúvidas','Reclamação','Outro';
    document.getElementById('pessoas').value = '1' , '2' , '3' , '4','5';
    
    const proximaSemana = new Date();
    proximaSemana.setDate(proximaSemana.getDate() + 7);
        
    document.getElementById('data').value = proximaSemana.toISOString().split('T')[0];
    document.getElementById('mensagem').value = 'Gostaria de fazer uma reserva para um jantar de aniversário. Preferência por mesa próxima à janela, se possível.';
    
    const contador = document.getElementById('contadorCaracteres');
    if (contador) {
        contador.textContent = document.getElementById('mensagem').value.length;
    }
    
    ['nome', 'email', 'telefone', 'assunto', 'mensagem'].forEach(validarCampo);
}
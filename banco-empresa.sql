CREATE DATABASE IF NOT EXISTS empresa CHARACTER SET utf8 COLLATE utf8_general_ci;
USE empresa;

CREATE TABLE IF NOT EXISTS produtos (
    id_prod INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(75) NOT NULL,
    valor FLOAT NOT NULL,
    qtdestoque INT NOT NULL,
    descricao TEXT,
    imagem VARCHAR(255),
    badge VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS novidades (
    id_nov INT AUTO_INCREMENT PRIMARY KEY,
    resumo VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL
);

INSERT INTO produtos (nome, valor, qtdestoque, descricao, imagem, badge) VALUES
('Picanha Nobre (Meia - 400g)', 99.90, 20, 'Corte tradicional selecionado, grelhado na brasa até ficar suculento por fora e macio por dentro. Acompanhado de batata acebolada.', 'imagens/prato1.jpg', 'BESTSELLER'),
('Picanha Nobre (Inteira - 700g)', 159.90, 15, 'Corte tradicional selecionado, grelhado na brasa até ficar suculento por fora e macio por dentro. Acompanhado de batata acebolada.', 'imagens/prato1.jpg', 'BESTSELLER'),
('Fraldinha Grelhada (Meia - 350g)', 69.90, 18, 'Macia e suculenta, uma das preferidas dos nossos clientes. Grelhada ao ponto perfeito com tempero especial. Acompanhamentos inclusos.', 'imagens/prato2.jpg', 'FAVORITO'),
('Fraldinha Grelhada (Inteira - 600g)', 119.90, 12, 'Macia e suculenta, uma das preferidas dos nossos clientes. Grelhada ao ponto perfeito com tempero especial. Acompanhamentos inclusos.', 'imagens/prato2.jpg', 'FAVORITO'),
('Costela no Bafo (Meia - 450g)', 79.90, 10, 'Assada lentamente na brasa até desmanchar na boca. Um clássico que não pode faltar. Servida com acompanhamentos completos.', 'imagens/prato3.jpg', 'PROMOÇÃO'),
('Costela no Bafo (Inteira - 800g)', 139.90, 8, 'Assada lentamente na brasa até desmanchar na boca. Um clássico que não pode faltar. Servida com acompanhamentos completos.', 'imagens/prato3.jpg', 'PROMOÇÃO'),
('Maminha Grelhada (Meia - 350g)', 79.90, 14, 'Grelhada na brasa com tempero especial da casa. Suculenta e saborosa, perfeita para compartilhar.', 'imagens/prato4.jpg', NULL),
('Maminha Grelhada (Inteira - 600g)', 79.90, 14, 'Grelhada na brasa com tempero especial da casa. Suculenta e saborosa, perfeita para compartilhar.', 'imagens/prato4.jpg', NULL),
('Coração de Frango (Meia - 250g)', 39.90, 25, 'Grelhado na brasa com tempero especial. Petisco clássico e irresistível da nossa churrascaria.', 'imagens/prato6.jpg', NULL),
('Linguiça Artesanal (Meia - 300g)', 49.90, 20, 'Linguiça artesanal produzida com temperos naturais, grelhada na brasa até o ponto ideal.', 'imagens/prato5.jpg', NULL),
('Combo Família Grande (4 pessoas)', 149.90, 5, 'Combo especial para toda a família com variedade de carnes grelhadas e acompanhamentos.', 'imagens/combo-premium.jpg', 'PROMOÇÃO');

INSERT INTO novidades (resumo, descricao) VALUES
('Sabor&Brasa celebra 11 anos!', 'Há 11 anos servindo os melhores churrascos da região. Agradecemos a cada cliente que faz parte dessa história incrível. Venha celebrar conosco com promoções especiais!'),
('Nova parceria: Carnes Importadas', 'Firmamos parceria com fornecedor premium de carnes importadas. Agora oferecemos cortes exclusivos do exterior com qualidade incomparável para sua experiência gastronômica.'),
('Delivery via WhatsApp disponível', 'Agora você pode pedir via WhatsApp! Resposta rápida, atendimento personalizado e entrega em toda a região. Pedidos mínimos e taxa de entrega variam por bairro.'),
('Certificação de qualidade obtida', 'O Sabor&Brasa recebeu certificação em manipulação de alimentos. Segurança e saúde em primeiro lugar para todos os nossos clientes e colaboradores.');
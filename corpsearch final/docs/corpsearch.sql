-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 30-Jun-2018 às 23:21
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corpsearch`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Parafusos'),
(2, 'Ferramentas Elétricas'),
(3, 'Ferramentas Manuais'),
(4, 'Ferramentas Especias'),
(5, 'Ferramentas Pneumáticas '),
(6, 'Ferramentas de Pintura');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `preco` float NOT NULL,
  `img` varchar(255) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `img`, `obs`, `categoria`) VALUES
(1, 'Parafuso auto-atarraxante', 2, 'images/produtos/parafuso-autoatarraxante.jpg', 'Possui rosca de passo largo em um corpo cônico e é fabricado em aço temperado.', 1),
(2, 'Parafusadeira com Controle de Torque', 700, 'images/produtos/parafusadeira.jpg', 'Parafusadeira com controle de torque velocidade variável e reversível', 2),
(3, 'Martelo', 25, 'images/produtos/martelo.png', 'Martelo comum, especial para trabalhos em alvenaria.', 3),
(4, 'Pistola para Pintura', 130, 'images/produtos/pistola.jpg', 'Pistola de alumínio com caneca plastica. ', 6),
(6, 'Jogo de Soquetes Estriado 1/2\" - 22 pcs ', 180, 'images/produtos/jogo.jpg', 'Maleta que proporciona organização; Fabricado em aço cromo vanádio; Garante mais agilidade, segurança e aumento na produtividade; Encaixe de 1/2\";', 3),
(7, 'Torquímetro de Estalo 1/2\"', 650, 'images/produtos/torquimetro.jpg', 'Indicado para oficinas mecânicas e manutenção industrial', 4),
(8, 'Encolhedor de Molas', 70, 'images/produtos/encolhedor.jpg', 'Encolhedor das molas da suspensão traseira', 4),
(9, 'Chave de Impacto Pneumática de 1/2 Pol.', 350, 'images/produtos/chave.jpg', 'Chave de impacto pneumática com acessórios', 5),
(10, 'Grampeador pneumático 6-16mm', 130, 'images/produtos/grampeador.jpg', 'Pressão de operação: 60 – 100 PSI', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipousuario`
--

INSERT INTO `tipousuario` (`id`, `tipo`) VALUES
(1, 'Cliente'),
(2, 'Fornecedor'),
(3, 'Cliente e Fornecedor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(40) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `pfpj` varchar(30) NOT NULL,
  `rgie` varchar(30) NOT NULL,
  `endereco` varchar(120) NOT NULL,
  `numero` int(14) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cep` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `tipoUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `nome`, `pfpj`, `rgie`, `endereco`, `numero`, `bairro`, `cidade`, `uf`, `cep`, `email`, `telefone`, `tipoUsuario`) VALUES
(5, 'admin', '$2y$10$0pGu1fEhbweJrK0WjymdBudl2bQNJPYolg4cOlJ0yIdAbEY40s66S', 'Administrador', '2925165', '56165165156', 'Rua Seth Francisco Debastiani', 21561, 'Um aí', 'Serafina Corrêa', 'RS', '99250000', 'umai@gmail.com', '5499887755', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`);

--
-- Indexes for table `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `tipoUsuario` (`tipoUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipoUsuario`) REFERENCES `tipousuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

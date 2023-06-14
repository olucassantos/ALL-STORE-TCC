-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jun-2023 às 07:23
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lojavirtual`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administracao`
--

CREATE TABLE `administracao` (
  `id_administracao` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administracao`
--

INSERT INTO `administracao` (`id_administracao`, `nome`, `email`, `login`, `senha`) VALUES
(1, 'Kaua Moreira', 'kaua.almeida13@etec.sp.gov.br', 'loxybr', 'root'),
(2, 'Roberta Moreira', 'roberta.moreira3@etec.sp.gov.br', 'romilgrau', 'root'),
(8, 'Gabriel Arruda', 'bielzim@email.com', 'biel', 'root');

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `titulo_banner` varchar(200) NOT NULL,
  `alt` varchar(200) NOT NULL,
  `url_banner` varchar(200) NOT NULL,
  `ativo_banner` varchar(1) NOT NULL,
  `imagem_banner` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `banner`
--

INSERT INTO `banner` (`id_banner`, `titulo_banner`, `alt`, `url_banner`, `ativo_banner`, `imagem_banner`) VALUES
(4, 'PRODUTOS NOVOS E USADOS', 'novos-produtos-informatica', 'all-store.com.br', 'S', 'bn-521951258d1a0dc55d4cb054842f141b.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_carrinho` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `qtde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id_carrinho`, `id_pedido`, `id_produto`, `valor`, `qtde`) VALUES
(1, 1, 81, '0', 1),
(2, 1, 94, '0', 1),
(3, 1, 93, '0', 1),
(4, 1, 78, '0', 1),
(5, 1, 51, '0', 1),
(6, 1, 35, '0', 1),
(7, 1, 29, '0', 1),
(8, 2, 81, '0', 1),
(9, 3, 92, '0', 1),
(10, 4, 100, '0', 1),
(11, 5, 30, '0', 1),
(12, 6, 29, '0', 1),
(13, 7, 81, '0', 1),
(14, 8, 81, '0', 1),
(15, 9, 92, '0', 1),
(16, 10, 100, '0', 1),
(17, 11, 97, '0', 1),
(18, 12, 81, '0', 1),
(19, 13, 81, '0', 1),
(20, 14, 94, '0', 1),
(21, 15, 101, '0', 1),
(22, 16, 100, '0', 1),
(23, 17, 100, '0', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(150) NOT NULL,
  `slug_categoria` varchar(220) NOT NULL,
  `ordem_categoria` int(11) NOT NULL,
  `ativo_categoria` varchar(1) NOT NULL,
  `imagem_produto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`, `slug_categoria`, `ordem_categoria`, `ativo_categoria`, `imagem_produto`) VALUES
(64, 'Mouses', '', 554454, 'S', ''),
(65, 'Monitores', '', 26565, 'S', ''),
(66, 'Placa de vídeo', '', 77785451, 'S', ''),
(67, 'Gabinetes', '', 55, 'S', ''),
(68, 'Memória RAM', '', 77, 'S', ''),
(70, 'Fone de ouvido (HeadSet)', '', 0, 'S', ''),
(71, 'Teclados', '', 456455, 'S', ''),
(74, 'Derivados', '', 0, 'S', ''),
(75, 'Notebook´s', '', 56, 'S', ''),
(76, 'Placa de rede', '', 96565, 'S', ''),
(77, 'Disco rígido (HD)', '', 2147483647, 'S', ''),
(78, 'Web Cam', '', 2147483647, 'S', ''),
(79, 'Placa de som', '', 2205, 'S', ''),
(80, 'Estabilizador ', '', 21548421, 'S', ''),
(81, 'Adaptador', '', 0, 'S', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `cliente` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `cidade` varchar(150) NOT NULL,
  `bairro` varchar(150) NOT NULL,
  `uf` varchar(20) NOT NULL,
  `cep` int(25) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha2` varchar(60) NOT NULL,
  `ativo_cliente` varchar(15) NOT NULL,
  `fone` int(30) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `ddd` int(11) NOT NULL,
  `complemento` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `cliente`, `endereco`, `cidade`, `bairro`, `uf`, `cep`, `email`, `senha2`, `ativo_cliente`, `fone`, `sexo`, `numero`, `ddd`, `complemento`) VALUES
(8, '505.515.128-57', 'Casa1', 'Araçatubahhh', 'rhrthtrhth', 'in', 421472424, '', '', 'S', 2147483647, 'M', '', 0, ''),
(9, '505.515.128-57', 'Casa', 'Araçatubahhh', 'rhrthtrhth', 'in', 421472424, 'kauazin6@gmail.com', 'root100', 'S', 2147483647, 'masculino', '757575', 57757523, 'casa'),
(10, 'kauan2', 'Casa', 'Araçatubahhh', 'rhrthtrhth', 'sp', 421472424, '', '', '', 2147483647, 'M', '757575', 57, 'casa'),
(11, 'kauan2', 'Casa', 'Araçatubahhh', 'rhrthtrhth', 'in', 421472424, '', '', '', 2147483647, 'M', '', 0, ''),
(12, 'kauan', 'Casa', 'Araçatubahhh', 'rhrthtrhth', 'sp', 421472424, '', '', '', 2147483647, 'M', '', 0, ''),
(13, 'Rosimar Moreira de Souza', 'Casa', 'Araçatuba1', 'utuuu1', 'São Paulo', 421472424, '', '', '', 217, 'M', '757575', 57, 'casa'),
(14, 'KAUÃ MOREIRA DE ALMEIDA', 'yhy5yhy', 'grhtrhy', 'utuuu1', 'São Paulo', 421472424, 'kmoreira606@gmail.com', '', 'S', 2147483647, 'M', '757575', 57, 'casa'),
(15, 'Rosimar Moreira de Souza', 'Casa', 'Araçatuba', 'casim', 'sp', 421472424, 'kauazin4@gmail.com', 'root', 'S', 217, 'masculino', '', 0, ''),
(16, 'kaua', 'yhy5yhy', 'grhtrhy', '', 'sp', 421472424, 'kmoreira606@gmail.com', 'root', 'S', 217, 'masculino', '', 0, ''),
(17, 'Rosimar Moreira de Souza', 'Casa', 'Araçatuba', '', 'sp', 421472424, 'kauazin4@gmail.com', 'ROOT', 'S', 217, 'masculino', '', 0, ''),
(18, '505.515.128-57', 'Casa', 'Araçatuba', 'utuuu1', 'sp', 421472424, 'kmoreira603@gmail.com', 'root30', '1', 2147483647, 'M', '', 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_venda`
--

CREATE TABLE `itens_venda` (
  `id_item` int(11) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `valor_item` decimal(10,0) NOT NULL,
  `qtde` int(11) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data_pedido` int(11) NOT NULL,
  `total_pedido` decimal(10,0) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_cliente`, `data_pedido`, `total_pedido`, `status`) VALUES
(2, 0, 2023, '0', ''),
(3, 0, 2023, '0', ''),
(4, 0, 2023, '0', ''),
(5, 0, 2023, '0', ''),
(6, 0, 2023, '0', ''),
(7, 0, 2023, '0', ''),
(8, 0, 2023, '0', ''),
(9, 0, 2023, '0', ''),
(10, 0, 2023, '0', ''),
(11, 0, 2023, '0', ''),
(12, 0, 2023, '0', ''),
(13, 0, 2023, '0', ''),
(14, 0, 2023, '0', ''),
(15, 0, 2023, '0', ''),
(16, 0, 2023, '0', ''),
(17, 0, 2023, '0', ''),
(18, 0, 2023, '0', ''),
(19, 0, 2023, '0', ''),
(20, 0, 2023, '0', ''),
(21, 0, 2023, '0', ''),
(22, 0, 2023, '0', ''),
(23, 0, 2023, '0', ''),
(24, 0, 2023, '0', ''),
(25, 0, 2023, '0', ''),
(26, 0, 2023, '0', ''),
(27, 0, 2023, '0', ''),
(28, 0, 2023, '0', ''),
(29, 0, 2023, '0', ''),
(30, 0, 2023, '0', ''),
(31, 0, 2023, '0', ''),
(32, 0, 2023, '0', ''),
(33, 0, 2023, '0', ''),
(34, 0, 2023, '0', ''),
(35, 0, 2023, '0', ''),
(36, 0, 2023, '0', ''),
(37, 0, 2023, '0', ''),
(38, 0, 2023, '0', ''),
(39, 0, 2023, '0', ''),
(40, 0, 2023, '0', ''),
(41, 0, 2023, '0', ''),
(42, 0, 2023, '0', ''),
(43, 0, 2023, '0', ''),
(44, 0, 2023, '0', ''),
(45, 0, 2023, '0', ''),
(46, 0, 2023, '0', ''),
(47, 0, 2023, '0', ''),
(48, 0, 2023, '0', ''),
(49, 0, 2023, '0', ''),
(50, 0, 2023, '0', ''),
(51, 0, 2023, '0', ''),
(52, 0, 2023, '0', ''),
(53, 0, 2023, '0', ''),
(54, 0, 2023, '0', ''),
(55, 0, 2023, '0', ''),
(56, 0, 2023, '0', ''),
(57, 0, 2023, '0', ''),
(58, 0, 2023, '0', ''),
(59, 0, 2023, '0', ''),
(60, 0, 2023, '0', ''),
(61, 0, 2023, '0', ''),
(62, 0, 2023, '0', ''),
(63, 0, 2023, '0', ''),
(64, 0, 2023, '0', ''),
(65, 0, 2023, '0', ''),
(66, 0, 2023, '0', ''),
(67, 0, 2023, '0', ''),
(68, 0, 2023, '0', ''),
(69, 0, 2023, '0', ''),
(70, 0, 2023, '0', ''),
(71, 0, 2023, '0', ''),
(72, 0, 2023, '0', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `titulo_produto` varchar(200) NOT NULL,
  `preco` varchar(10) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `duracao` varchar(25) NOT NULL,
  `descricao` text NOT NULL,
  `conteudo` text NOT NULL,
  `slug_produto` varchar(220) NOT NULL,
  `ativo_produto` varchar(11) NOT NULL,
  `imagem_produto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `id_categoria`, `titulo_produto`, `preco`, `autor`, `duracao`, `descricao`, `conteudo`, `slug_produto`, `ativo_produto`, `imagem_produto`) VALUES
(29, 64, 'Mouse USB - Lightspeed RGB', '$80,00', 'ALL-STORE', 'NOVO', 'Mouse Gamer HyperX Pulsefire Core RGB, 6200 DPI, 7 botões programáveis, USB, Black', '              ', 'mouse-usb-lightspeed-rgb', 'S', 'mouserg.jpg'),
(30, 65, 'Monitor Gamer Curvo Samsung - 4K', '$5.840,90', 'ALL-STORE', 'NOVO', 'Monitor Gamer Curvo Samsung Odyssey 27\" WQHD, 240Hz, 1ms, HDMI, Display Port, USB, compatível com G-Sync, FreeSync Premium Pro, com ajuste de altura, preto, série G7', '50', 'monitor-gamer-curvo-samsung-4k', 'S', 'monitor.jpg'),
(34, 70, 'HeadSet Gamer USB - edição especial', '$250,00', 'ALL-STORE', 'NOVO', 'Você no controle do jogo.\r\nDesfrute de um som de alta qualidade com o Headset Gamer HP H360. \r\nSeu driver confortável de 50mm preza pela qualidade na reprodução do som, com nitidez nas frequências baixas, distorções mínimas nas frequências médias, e estabilidade nas frequências altas.', '          ', 'headset-gamer-usb-edicao-especial', 'S', 'HEADSET2.jpg'),
(35, 69, 'SSD 1TB', '$500,00', 'ALL-STORE', 'NOVO', 'Hd Ssd M.2 Pcie 1tb Kingston Nv1 Nvme Snvs/1000g\r\n1000G NV1 M.2 2280 NVMe SSD\r\nDesempenho eficiente.', '        ', 'ssd-1tb', 'S', 'ssd1.jpg'),
(52, 74, 'Microsoft Xbox Series - 512GB', '$2.027,00', 'ALL STORE COMPUTING', 'NOVO', 'Com seu console Xbox Series você terá entretenimento garantido todos os dias. \r\nSua tecnologia foi criada para colocar novos desafios para jogadores novatos e especialistas.\r\n\r\nA nova geração de consoles é comandada por Xbox Series que chegou ao mercado para surpreender a todos. \r\n\r\nSua potência e alto desempenho permitirão que você reduza consideravelmente as horas de download de jogos e conteúdo em comparação com outros consoles. \r\nAlém disso, você poderá jogar por horas enquanto se diverte com jogadores de todo o mundo.\r\n\r\nAdaptado às suas necessidades\r\nSalve as suas aplicações, fotos, vídeos e muito mais no disco rígido, que tem uma capacidade de 512 GB.\r\nPor ter um processador de 8 núcleos e um gráfico, fornecem uma experiência dinâmica, respostas ágeis e transições suaves de imagens de alta definição.\r\nPor outro lado, tem uma porta USB e saída HDMI, que permitem conectar acessórios e carregar a bateria do controle enquanto você joga.\r\n\r\nVocê poderá reproduzir música, assistir seus filmes e séries favoritos através dos aplicativos para download.', '      ', 'microsoft-xbox-series-512gb', 'S', 'box.jpeg'),
(81, 64, 'Wireless Gamer Mouse - Tech Fury', 'R$68,50', 'ALL-STORE', 'NOVO', 'O Mouse Tech Fury, da Gshield, é a união de tecnologia e conforto ! Com um design compacto permite mais liberdade de movimento, e a sua superfície vazada ajuda na ventilação e diminui a sensação de calor da mão durante o uso!', '        ', 'wireless-gamer-mouse-tech-fury', 'S', 'R.jpg'),
(82, 75, 'Notebook Samsung Intel Celeron - 256gb - SSD', '$1.899,99', 'ALL STORE COMPUTING', 'NOVO', 'O Samsung Book possui uma arquitetura de última geração e design elegante para quem busca qualidade, desempenho e proteção do investimento. Conta com portas de acesso à memória e unidade de armazenamento, facilitando o upgrade e proporcionando mais longevidade ao sistema. A família Samsung Books traz uma variedade de configurações, atendendo aos mais diversos perfis de utilização, seja para estudo, trabalho ou uso geral.', '  ', 'notebook-samsung-intel-celeron-256gb-ssd', 'S', '1.jpeg'),
(83, 75, 'Notebook Samsung - Intel Core I5', '$2.969,00', 'ALL STORE COMPUTING', 'NOVO', 'O Samsung Book possui uma arquitetura de última geração e design elegante para quem busca qualidade, desempenho e proteção do investimento. Conta com portas de acesso à memória e unidade de armazenamento, facilitando o upgrade e proporcionando mais longevidade ao sistema. A família Samsung Books traz uma variedade de configurações, atendendo aos mais diversos perfis de utilização, seja para estudo, trabalho ou uso geral.', ' ', 'notebook-samsung-intel-core-i5', 'S', 'not2.jpeg'),
(84, 75, 'Notebook Lenovo Ideapad Ryzen7', '$2.849,00', 'ALL STORE COMPUTING', 'NOVO', 'O Notebook Lenovo Ideapad 3 é perfeito para o seu dia a dia. Completo, conta com tela ultrafina de 15.6” para que você possa aproveitar o melhor, seja para o trabalho ou diversão. Conta ainda com bateria de ótima duração e webcam para você fazer as suas vídeo chamadas. Além disso, possui processador Ryzen R7-5700U que garante ótimo desempenho até mesmo para os usuários que necessitam passar mais tempo com o aparelho. Você merece ter um notebook com alta performance para as suas tarefas do dia a dia, e com toda a qualidade Lenovo.', ' ', 'notebook-lenovo-ideapad-ryzen7', 'S', 'not3.jpeg'),
(85, 75, 'Notebook Positivo Dual Core - Celeron 4gb', '$1.447,00', 'ALL STORE COMPUTING', 'NOVO', 'Notebook Positivo Dual Core 4GB 128GB SSD Tela 15,6” Windows 11 Home Motion C4128G-15 + Microsoft Office 365 Personal com licença válida por 1 ano.\r\n\r\nO novo Motion C com tela de 15.6? vem com Alexa integrada. Assistente de voz Alexa: diversão ou informação, ajuda nas tarefas ficou mais fácil, apenas por comando de voz. Você pode usar sua voz para pedir informações, músicas, notícias e muitos mais, além de poder controlar seus dispositivos inteligentes e desfrutar de todas as funcionalidades que o app Alexa possui.\r\n', ' ', 'notebook-positivo-dual-core-celeron-4gb', 'S', 'not4.jpeg'),
(86, 75, 'Notebook Acer Aspire 3 - SSD - 128gb', '$1.699,00', 'ALL STORE COMPUTING', 'NOVO', 'Com a linha Aspire 3 da Acer você poderá experimentar um novo nível de design e desempenho, tanto para o uso diário do seu notebook quanto para uso profissional.\r\nSeu processador Intel Celeron, lhe permitirá executar diversos programas e processos indispensáveis ​​para se desenvolver no dia a dia, seja no seu trabalho ou nos momentos de lazer em sua casa.\r\nO disco sólido de 128 GB faz o equipo funcionar em alta velocidade e por isso oferece a maior agilidade para operar com diversos programas.\r\nA bateria deste equipamento tem uma autonomia em torno de 9 horas. A duração varia dependendo do uso, a configuração e outros fatores, mas você poderá usá-la por várias horas sem depender das tomadas.\r\n', ' ', 'notebook-acer-aspire-3-ssd-128gb', 'S', 'not5.jpeg'),
(87, 75, 'Notebook Lenovo IdealPad - Arctic Gray ', '$2.849,00', 'ALL STORE COMPUTING', 'NOVO', 'O notebook Lenovo IdeaPad 3 foi projetado para tornar sua vida mais fácil. Seu design elegante e inovador e sua comodidade para transportá-lo, farão com que seja seu PC favorito. Qualquer tarefa que você proponha, seja em casa ou na oficina, você fará isso com facilidade graças ao seu poderoso desempenho.', ' ', 'notebook-lenovo-idealpad-arctic-gray', 'S', 'not6.jpeg'),
(88, 75, 'Notebook Acer I7 - 512g - 8GB RAM', '$5.499,99', 'ALL STORE COMPUTING', 'NOVO', 'O notebook Acer AN515-57-740K é uma solução para trabalhar e estudar, bem como para entreter. Por ser portátil, a oficina deixará de ser o seu único espaço a utilizar para abrir-lhe as portas a outros ambientes, seja em casa ou no escritório.', '    ', 'notebook-acer-i7-512g-8gb-ram', 'S', 'not7.jpeg'),
(89, 75, 'Apple Macbook Pro 16 - M1 - 1TB', '$24.998,00', 'ALL STORE COMPUTING', 'NOVO', 'O sistema possui o chip Apple M1 Pro 10-Core, que fornece a potência e o desempenho necessários para lidar com seus fluxos de trabalho profissionais. A tela Liquid Retina XDR de 16,2\" apresenta uma resolução de 3456 x 2234, 1.000 nits de brilho sustentado, 1.600 nits de brilho máximo, suporte à gama de cores P3 e muito mais. Com até 1 TB de armazenamento SSD, você poderá carregar arquivos e inicie aplicativos rapidamente, permitindo que você trabalhe com bibliotecas de fotos e vídeos de praticamente qualquer lugar.', ' ', 'apple-macbook-pro-16-m1-1tb', 'S', 'not8.jpeg'),
(90, 64, 'Mouse recarregável Logitech Series ', '$686,51', 'ALL STORE COMPUTING', 'NOVO', 'A Logitech projeta produtos e experiências que ocupam um lugar cotidiano na vida das pessoas, com foco na inovação e na qualidade. Seu objetivo é criar momentos verdadeiramente únicos e significativos para os seus usuários. Os mouses da Logitech se adaptam à forma da sua mão para lhe proporcionar horas de conforto. Sem a necessidade de mover o braço para deslizar o cursor, sua mão ficará menos cansada. Eles são ideais para qualquer espaço de trabalho e para aqueles que têm a mesa cheia de vários objetos.\r\n', ' ', 'mouse-recarregavel-logitech-series', 'S', 'mou1.jpeg'),
(91, 64, 'Mouse Gamer Vertical Ergonômico - Led 6 Botões', '$59,99', 'ALL STORE COMPUTING', 'NOVO', 'É fato que para trabalhar em seu computador ou até mesmo para usá-lo como forma de lazer você precisa de conforto e isso é o que esse mouse lhe proporcionará com seu design ergonômico na vertical fazendo com que seu braço fique em uma posição de conforto e descanso, evitando o desconforto da má postura. Seu sensor óptico proporciona movimentos mais precisos e sensíveis do que os mouses convencionais, sendo muito ideal também para quem joga jogos no computador!!', ' ', 'mouse-gamer-vertical-ergonomico-led-6-botoes', 'S', 'mou2.jpeg'),
(92, 64, 'Mouse Sem Fio Razer Viper Cyberpunk', '$1.689,99', 'ALL STORE COMPUTING', 'NOVO', 'No Cyberpunk 2077, as palavras nem sempre funcionam. Faça com que eles entendam seu ponto (ou vários) manejando sua arma de forma limpa, cortesia do sensor óptico Razer™ Focus+ - projetado para liderar o mercado com 20.000 DPI e 99,6% de precisão de resolução, além de diversas funções inteligentes.\r\nNight City vai te fazer de gato-sapato se você vacilar ou hesitar. Ainda bem que você sempre será o mais rápido ao sacar sua arma com os interruptores ópticos de mouse Razer™ de segunda geração, que oferecem um tempo de resposta incrível de 0,2 ms para cada clique.', ' ', 'mouse-sem-fio-razer-viper-cyberpunk', 'S', 'mou3.jpeg'),
(93, 64, 'Mouse Gamer - Bluetooth - Recarregável - Sem Fio', '$249,99', 'ALL STORE COMPUTING', 'NOVO', '7 diferentes cores de luz led mudam durante o uso, proporcionando iluminação ambiente suave e iluminação led tranquilizadora, efeito de luz mais transparente, adequado para as necessidades de mais tipos de jogos, tornando o mouse colorido e imaginativo.\r\nBuilt-in durável 800mah bateria de lítio embutida, fácil de carregar através do cabo usb incluído, não há necessidade de substituir a bateria, o tempo de espera é muito longo.\r\n\r\nSuporte a múltiplas funções: uso durante o carregamento, função de poupança de energia, modo de sono automático.\r\ns botões, esquerdo e direito são projetados sem ruído, e o clique silencioso faz com que você não se preocupe mais em incomodar os outros, permitindo que você se concentre em jogos e trabalho.\r\n', ' ', 'mouse-gamer-bluetooth-recarregavel-sem-fio', 'S', 'mou4.jpeg'),
(94, 64, 'Mouse Gamer New Edition - Fortrek Cruise', '$151,59', 'ALL STORE COMPUTING', 'NOVO', 'O Mouse Cruiser New Edition da marca Fortrek é uma nova edição do mouse cruiser, totalmente repaginado, moderno e com recursos avançados de um jeito que você nunca viu.\r\nEste modelo é ideal para compor o seu setup gamer, possuindo sensor óptico Pixart 3327 de extrema qualidade, Switch Huano, com um tempo de resposta equivalente a 1 milissegundo, o que proporciona a você maior precisão em movimentos rápidos durante o uso e resolução ajustável de acordo com a sua necessidade.\r\nAlém disso, este mouse também conta com 8 botões de funções macro, o que possibilita a você liberdade de executar comandos simples apenas com o uso do mouse. Contando também com uma velocidade de 220 polegadas por segundo e RGB personalizável por software, o que tornará a sua experiência mais completa.', ' ', 'mouse-gamer-new-edition-fortrek-cruise', 'S', 'mou5.jpeg'),
(95, 64, 'Mouse Redragon Cobra White M711-W ', '$126,90', 'ALL STORE COMPUTING', 'NOVO', 'Com mais de 20 anos de experiência na fabricação de produtos, a Redragon inova dia a dia no design e na qualidade. Seu objetivo é produzir equipamento de alta qualidade para os jogadores, com excelente desempenho e a um preço acessível. Os mouses da Redragon são adequados para todas as ocasiões, seja para se entreter em casa ou usá-lo no trabalho. Experimente o design confortável e elegante deste dispositivo.\r\n', ' ', 'mouse-redragon-cobra-white-m711-w', 'S', 'mou6.jpeg'),
(96, 65, 'Monitor Gamer LG - LED - 23.8', '$799,99', 'ALL STORE COMPUTING', 'NOVO', 'A LG busca entender aos usuários a fim de oferecer-lhes soluções ótimas e novas experiências através da evolução tecnológica. Desfrute da combinação perfeita de design, qualidade e desempenho que a empresa oferece neste monitor.\r\nCom a sua tela LED você não só economiza energia, porque seu consumo é baixo, mas você também verá cores nítidas e definidas em seus filmes ou séries favoritas.\r\nEste monitor de 23.8\" lhe dará comodidade para estudar, trabalhar ou assistir a um filme no seu tempo de lazer. Além disso, sua resolução de 1920 x 1080 permite que você desfrute de momentos únicos graças a uma imagem de alta fidelidade. Uma de suas virtudes é que ele tem tela anti-reflexo, desta forma você não vai ver o que está por trás de você refletido e evitará forçar sua visão a focar o conteúdo. Seu tempo de resposta de 5 ms o torna ideal para gamers e cinéfilos, pois é capaz de exibir imagens em movimento sem halos ou bordas desfocadas.\r\n', ' ', 'monitor-gamer-lg-led-23-8', 'S', 'mon1.jpeg'),
(97, 65, 'Monitor 24\" Full HD LED - Preto e vermelho', '$771,65', 'ALL STORE COMPUTING', 'NOVO', 'Desenvolvidos para você que quer adquirir um monitor Gamer com preço justo e um excelente desempenho.\r\nPara garantir que a sua experiência seja única, tomamos cuidado em cada detalhe:\r\nPara garantir que você saia na frente dos seus adversários na jogatina, oferecemos a você um tempo de resposta de apenas 1 milissegundo, ou 1ms.\r\nCom isso, o seu tempo de reação será instantâneo a sua ação na tela do jogo.\r\nMedido em Hertz (Hz), a taxa de atualização é bem como o próprio nome diz: o número de vezes que a imagem na tela atualiza por segundo. Outra função é medir quantos quadros, também por segundo, o monitor em questão é capaz de gerar e, principalmente, sustentar.\r\nOs monitores HQ Moba possuem taxa de atualização de 75Hz, que garantem imagens vivas, nítidas e livres de borrões e atrasos.', ' ', 'monitor-24-full-hd-led-preto-e-vermelho', 'S', 'mon2.jpeg'),
(98, 65, 'Monitor Portátil Gamer - Full HD', '$1.930,27', 'ALL STORE COMPUTING', 'NOVO', '1 x Monitor portátil 17.3\" IPS Full HD 1920x1080 UPERFECT com suporte integrado\r\n1 x Cabo USB-C a USB-C\r\n1 x Cabo HDMI\r\n1 x USB-C para USB-A\r\n1 x carregador de parede padrão Brasil\r\n1 x guia de usuário\r\n\r\nDETALHES:\r\n- Full HD 1080p + HDR\r\n- 178 ° IPS ângulo de visão completa\r\n- 02 conexões usb c\r\n- Alto-falantes duplos de 2w\r\n- Suporte paisagem ou modo retrato\r\n- Plug & play\r\n\r\nMEDIDAS:\r\n400mm x 235mm x 8mm\r\n916 gramas', ' ', 'monitor-portatil-gamer-full-hd', 'S', 'mon3.jpeg'),
(99, 65, 'Monitor 21.5\' - Full HD - Freesync', '$615,00', 'ALL STORE COMPUTING', 'NOVO', 'O Monitor LG acentua ainda mais desempenho dos visores de cristal líquido. A tela de 21,5 polegadas com resolução Full HD (1920X1080) proporciona imagens nítidas e precisas com incrível precisão cromática.\r\n\r\nPara ajudar a diminuir a fadiga ocular e proporcionar conforto visual durante a leitura de documentos no monitor, o Modo Leitura ajusta a temperatura da cor e a luminância, tornando a experiência similar à leitura de um livro em papel.\r\nO Flicker Safe reduz a cintilação invisível na tela, ajudando a reduzir o cansaço visual. Assim, você pode trabalhar com conforto durante períodos mais longos.\r\nCom a tecnologia AMD FreeSync, os jogadores podem desfrutar de movimentos perfeitos e fluidos durante jogos rápidos e em alta resolução, praticamente eliminando as falhas e intermitências na tela.\r\n', ' ', 'monitor-21-5-full-hd-freesync', 'S', 'mon4.jpeg'),
(100, 65, 'Monitor LG LED - 19,5\" -  60Hz 2ms', '$419,85', 'ALL STORE COMPUTING', 'NOVO', 'Reduzindo o nível de oscilação para quase zero, o Flicker Safe ajuda a proteger seus olhos contra oscilações exaustivas.\r\nO modo Dynamic Action Sync permite reagir instantaneamente aos seus oponentes e atacá-los sem nenhum atraso na exibição. Ele sincroniza seus sentidos com cenas em tempo real em jogos rápidos, minimizando o atraso na entrada.\r\nO Estabilizador de Preto oferece total clareza visual, mesmo em jogos em que você passa muito tempo no escuro. Ele sincroniza e ilumina as áreas mais escuras, para que você possa encontrar inimigos escondidos nas sombras e atirar primeiro.\r\n', ' ', 'monitor-lg-led-19-5-60hz-2ms', 'S', 'mon5.jpeg'),
(101, 65, 'Monitor Ultrawide 34\' - Full HD Freesync ', '$3.125,98', 'ALL STORE COMPUTING', 'NOVO', 'Este monitor de 34\" Graças à sua tela LCD você receberá gráficos com grande nitidez, cores vivas e atraentes. Comodidade para estudar, trabalhar, jogar ou assistir a um filme no seu tempo de lazer.\r\n\r\nA resolução UltraWide™ Full HD (2560x1080) oferece 33% mais espaço de tela em largura do que a tela com resolução FHD (1920x1080), dando uma proporção de aspecto de 21: 9.\r\n\r\nA tecnologia HDR agora é aplicada a vários conteúdos. Este monitor é compatível com alta faixa dinâmica HDR10 padrão da indústria, com base na gama de cores sRGB de 95%, suportando níveis específicos de cor e brilho que permite aos espectadores desfrutar das cores dramáticas do conteúdo.\r\n\r\nCom a tecnologia AMD FreeSync, os jogadores podem experimentar movimentos fluidos e contínuos em jogos de alta resolução e em ritmo acelerado. Ele reduz virtualmente a tela rasgando e gaguejando.\r\n\r\nUma de suas virtudes é que ele tem tela anti-reflexo, desta forma você não vai ver o que está por trás de você refletido e evitará forçar sua visão a focar o conteúdo. Seu tempo de resposta de 5 ms o torna ideal para gamers e cinéfilos, pois é capaz de exibir imagens em movimento sem halos ou bordas desfocadas.', ' ', 'monitor-ultrawide-34-full-hd-freesync', 'S', 'mon6.jpeg'),
(102, 65, 'Monitor TGT MG15 15\" - Preto 100V/240V', '$284,58', 'ALL STORE COMPUTING', 'NOVO', 'Desfrute de todas as qualidades que o monitor TGT MG15 tem para lhe oferecer. Percebe as imagens duma forma completamente diferente e complementa qualquer espaço, seja em sua casa ou escritório.\r\n\r\nUma experiência visual de qualidade\r\nSeus 15\" serão ideais para você em sua vida diária, seja para estudar ou trabalhar. Além disso, sua resolução de 1024 x 768 permite que você desfrute de momentos únicos graças a uma imagem de alta fidelidade.', ' ', 'monitor-tgt-mg15-15-preto-100v-240v', 'S', 'mon7.jpeg'),
(103, 66, 'Placa De Video - Pcyes Geforce RTX 3060', '$214,90', 'ALL STORE COMPUTING', 'NOVO', 'O processamento gráfico se tornou um ingrediente essencial para o PC moderno. Hoje em dia, nós simplesmente exigimos mais de nossos computadores. Se você quiser aprimorar fotos, editar vídeos, assistir a filmes, jogar ou simplesmente deseja uma experiência completa no Windows® 7, a placa gráfica NVIDIA® GeForce® G210 traz um incrível poder de processamento gráfico para seu PC a um preço inacreditável.', ' ', 'placa-de-video-pcyes-geforce-rtx-3060', 'S', 'pla1.jpeg'),
(104, 66, 'Placa de vídeo Nvidia Asus - GeForce RTX ', '$4.335,90', 'ALL STORE COMPUTING', 'NOVO', 'Esse componente eletrônico processa as informações que chegam ao dispositivo e as transforma em imagens ou vídeos para exibi-las visualmente. É ideal para trabalhar com aplicativos gráficos, pois permite obter imagens mais nítidas.\r\n\r\nA Nvidia é o fabricante líder de placas de vídeo, sua qualidade garante uma experiência positiva no desenvolvimento do motor gráfico do seu computador. Além disso, seus processadores usam tecnologia de ponta para que você possa desfrutar de um produto rápido e durável.', '  ', 'placa-de-video-nvidia-asus-geforce-rtx', 'S', 'pla2.jpeg'),
(105, 66, 'Placa de vídeo AMD XFX Speedster - Radeon 6600', '$2.422,24', 'ALL STORE COMPUTING', 'NOVO', 'Esse componente eletrônico processa as informações que chegam ao dispositivo e as transforma em imagens ou vídeos para exibi-las visualmente. É ideal para trabalhar com aplicativos gráficos, pois permite obter imagens mais nítidas.\r\n\r\nA AMD é uma fabricante americana de placas de vídeo, devido à sua tecnologia tem se destacado na criação de processadores de alta qualidade que permitem um excelente desempenho do motor gráfico do seu computador.\r\n', ' ', 'placa-de-video-amd-xfx-speedster-radeon-6600', 'S', 'pla3.jpeg'),
(106, 66, 'Placa de vídeo Dazz GeForce - 700 Series ', '$415,92', 'ALL STORE COMPUTING', 'NOVO', 'Esse componente eletrônico processa as informações que chegam ao dispositivo e as transforma em imagens ou vídeos para exibi-las visualmente. É ideal para trabalhar com aplicativos gráficos, pois permite obter imagens mais nítidas.\r\n\r\nA Nvidia é o fabricante líder de placas de vídeo, sua qualidade garante uma experiência positiva no desenvolvimento do motor gráfico do seu computador. Além disso, seus processadores usam tecnologia de ponta para que você possa desfrutar de um produto rápido e durável.', '  ', 'placa-de-video-dazz-geforce-700-series', 'S', 'pla4.jpeg'),
(107, 66, 'Placa de vídeo Nvidia Pcyes - 200 Series', '$195,90', 'ALL STORE COMPUTING', 'NOVO', 'Esse componente eletrônico processa as informações que chegam ao dispositivo e as transforma em imagens ou vídeos para exibi-las visualmente. É ideal para trabalhar com aplicativos gráficos, pois permite obter imagens mais nítidas.\r\n\r\nA Nvidia é o fabricante líder de placas de vídeo, sua qualidade garante uma experiência positiva no desenvolvimento do motor gráfico do seu computador. Além disso, seus processadores usam tecnologia de ponta para que você possa desfrutar de um produto rápido e durável.', ' ', 'placa-de-video-nvidia-pcyes-200-series', 'S', 'pla5.jpeg'),
(108, 66, 'Placa De Vídeo Nvidia Gtx 1660 Super 6gb', '$1.559,00', 'ALL STORE COMPUTING', 'NOVO', 'Fabricante de chips: Nvidia\r\nChip gráfico: Geforce GTX 1660 SUPER\r\nProcesso de produção: 12nm\r\nCódigo do núcleo: tu116\r\nFreqüência do núcleo: 1530mhz\r\nNúcleo de cuda: 1408 unificado', ' ', 'placa-de-video-nvidia-gtx-1660-super-6gb', 'S', 'pla6.jpeg'),
(109, 66, 'Placa de vídeo Nvidia Gigabyte GeForce 10 Series', '$747,98', 'ALL STORE COMPUTING', 'NOVO', 'A Nvidia é o fabricante líder de placas de vídeo, sua qualidade garante uma experiência positiva no desenvolvimento do motor gráfico do seu computador. Além disso, seus processadores usam tecnologia de ponta para que você possa desfrutar de um produto rápido e durável.\r\nAo contar com 384 núcleos, os cálculos para o processamento gráfico serão realizados de maneira simultânea, conseguindo um ótimo resultado do trabalho da placa. Isso permitirá que faça leituras esparsas e rápidas de e para a GPU.\r\n\r\nCritério fundamental na escolha uma placa de vídeo, a sua resolução de 4096x2160 não irá decepcioná-lo. A decodificação dos píxeis na sua tela fará com que você veja até os menores detalhes em cada ilustração.', ' ', 'placa-de-video-nvidia-gigabyte-geforce-10-series', 'S', 'pla7.jpeg'),
(110, 66, 'Placa de vídeo Nvidia -  40 Series - 16gb', '$13.895,95', 'ALL STORE COMPUTING', 'NOVO', 'Esse componente eletrônico processa as informações que chegam ao dispositivo e as transforma em imagens ou vídeos para exibi-las visualmente. É ideal para trabalhar com aplicativos gráficos, pois permite obter imagens mais nítidas.\r\n\r\nA Nvidia é o fabricante líder de placas de vídeo, sua qualidade garante uma experiência positiva no desenvolvimento do motor gráfico do seu computador. Além disso, seus processadores usam tecnologia de ponta para que você possa desfrutar de um produto rápido e durável.', ' ', 'placa-de-video-nvidia-40-series-16gb', 'S', 'pla8.jpeg'),
(111, 68, 'Memória 4gb Ddr3 2rx8 Pc3l-12800e Servidor Dell', '$330,98', 'ALL STORE COMPUTING', 'NOVO', 'Sua capacidade de 4 GB distribuída em módulos de 1 x 4 GB faz desta memória um suporte ideal para o trabalho com documentos complexos, navegação web multi-abas, conteúdo multimídia, entre outros.\r\nCom este módulo de tecnologia DDR3, você melhorará o desempenho do seu dispositivo, alcançando velocidades mais altas de transferência e barramento. Além disso, opera em níveis de baixa tensão, o que otimiza o desempenho e reduz o consumo de energia.\r\nVocê pode usá-lo para atividades domésticas e também navegar na Internet. enviar e-mails ou multimídia, ou trabalhar usando várias funções simultaneamente, esta memória é para você. Graças à sua velocidade de 1600 MHz, será capaz de executar todas as suas tarefas de forma rápida e eficaz.', ' ', 'memoria-4gb-ddr3-2rx8-pc3l-12800e-servidor-dell', 'S', 'mer1.jpeg'),
(112, 68, 'Memória Ram Notebook 8gb - Upgamer Black', '$134,39', 'ALL STORE COMPUTING', 'NOVO', 'Se você percebe que seu computador está com baixo desempenho ou que sua capacidade não atende às suas necessidades de uso, é hora de renovar sua RAM. Você aumentará sua produtividade e trabalhará de forma rápida e simultânea com vários aplicativos.\r\nCom sua tecnologia DDR4, irá melhorar o desempenho do seu dispositivo operando em 3 e 4 canais, gerando maior fluência e velocidade na transferência de dados. Otimize o desempenho do seu computador ao máximo!\r\nEsta memória de formato SODIMM é ideal para o seu Notebooks. Instale-a e comece a desfrutar de uma operação ideal!', '  ', 'memoria-ram-notebook-8gb-upgamer-black', 'S', 'mer2.jpeg'),
(113, 68, 'Memória RAM Vengeance LPX -  color preto 32GB', '$929,87', 'ALL STORE COMPUTING', 'NOVO', 'Com desenhos únicos e modernos, a Corsair é uma das marcas mais escolhidas pelos usuários na hora de comprar uma memória ram. Carregar programas mais rapidamente, aumentar a capacidade de responder e executar aplicativos pesados são alguns dos recursos e vantagens que você terá ao comprar essa memória. Não espere mais para melhorar o desempenho do seu computador.\r\n', ' ', 'memoria-ram-vengeance-lpx-color-preto-32gb', 'S', 'mer3.jpeg'),
(114, 68, 'Memória Ram Golden - 4gb Ddr4 (Notebook)', '$98,79', 'ALL STORE COMPUTING', 'NOVO', 'Memória Ram para Notebook, marca Golden Memory, 4gb DDR4 2666 Mhz, 1,2v, PC4-21300, CL19! 260-Pin SODIMM. ', ' ', 'memoria-ram-golden-4gb-ddr4-notebook', 'S', 'mer4.jpeg'),
(115, 68, 'Memória Ddr5 16gb Kingston -  Desktop Rgb ', '$ 744,13', 'ALL STORE COMPUTING', 'NOVO', 'A FURY KF548C38BBA-16 é um módulo de memória 2G x 64 bits (16GB) DDR5-4800 CL38 SDRAM (DRAM síncrona) 1Rx8, com base em oito componentes FBGA 2G x 8 bits por módulo. O modulo suporta Intel® Extreme Memory Profiles (Intel® XMP) 3.0.\r\nCada módulo foi testado para funcionar em DDR5-4800 em baixa latência com temporização de 38-38-38 em 1.1V. Parâmetros de tempo adicionais são mostrados na seção Plug-N-Play (PnP) Timing Parameters abaixo. Cada módulo de memória DIMM possui 288 pinos com contatos de ouro.', ' ', 'memoria-ddr5-16gb-kingston-desktop-rgb', 'S', 'mer5.jpeg'),
(116, 68, 'Memória RAM Impact DDR4 -16GB HyperX', '$254,12', 'ALL STORE COMPUTING', 'NOVO', 'Se você percebe que seu computador está com baixo desempenho ou que sua capacidade não atende às suas necessidades de uso, é hora de renovar sua RAM. Você aumentará sua produtividade e trabalhará de forma rápida e simultânea com vários aplicativos.', ' ', 'memoria-ram-impact-ddr4-16gb-hyperx', 'S', 'mer6.jpeg'),
(117, 68, 'Kit Memória Kingston Ddr2 4gb(2x2gb) 667mhz ', '$102,90', 'ALL STORE COMPUTING', 'NOVO', 'Marca: Kingston\r\nModelos: KVR667D2N5/2G\r\nFormato da memória: DIMM\r\nLinha: Value Ram\r\nComputador: Desktop\r\nTecnologia de memória: SDRAM\r\nPlaca mãe: DDR2\r\nCompatibilidade: INTEL e AMD\r\nVelocidades: PC2 - 5300\r\nFrequências: 667 MHZ\r\nCapacidade de armazenamento: 2GB\r\nPinos: 240\r\nQuantidade de chips: 16 chips\r\nVoltagem: 1.8v', ' ', 'kit-memoria-kingston-ddr2-4gb-2x2gb-667mhz', 'S', 'mer7.jpeg'),
(118, 68, 'Memória 18x - 8gb Ddr3 e Servidor Dell', '$11.255,49', 'ALL STORE COMPUTING', 'NOVO', 'Voltagem: 1.5V ou 1.35v\r\nVelocidade: PC3-12800e\r\nCorreção de erro: ECC\r\nTecnologia: DDR3-1600mhz\r\nFormato: UDIMM ECC\r\nCHIP ORGANIZATIONS: 2rX8', ' ', 'memoria-18x-8gb-ddr3-e-servidor-dell', 'S', 'mer8.jpeg'),
(119, 67, 'Gabinete Gamer Infernal Dragon - Lateral Vidro', '$9.999,00', 'ALL STORE COMPUTING', 'NOVO', 'Pintura exclusiva Infernal Dragon feita pelo artista Brock Hofer\r\nPainel frontal no estilo mash para maior fluxo de ventilação\r\nSlot para instalação de GPU na vertical\r\nJanela lateral de vidro temperado\r\nItem exclusivo da linha Infernal Dragon.\r\n\r\nTopo: 3 x 120 mm / 2 x 140 mm\r\nFrente: 3 x 120 mm / 3 x 140 mm\r\nTraseira: 1 x 140 mm / 1 x 120 mm\r\n', '  ', 'gabinete-gamer-infernal-dragon-lateral-vidro', 'S', 'gab1.jpeg'),
(120, 67, 'Gabinete Gamer Cougar - Cratus - Vidro Temperado ', '$3.750,55', 'ALL STORE COMPUTING', 'NOVO', 'Modelo CGR-5LMSB\r\nArmação Tubular Construída em 3D\r\nTransparência com vidro temperado curvo\r\nDesenho Dinâmico Avançado\r\nCratus tem um feixe de luz reto único que apresenta uma atmosfera de iluminação única.\r\nGerenciamento rápido de cabos\r\nDado que todos os cabos estão expostos, pode ser bastante difícil organizar os cabos\r\nO design de estrutura aberta do Cratus permite a criação de soluções de resfriamento impressionantes\r\nTipo de gabinete Torre Média', ' ', 'gabinete-gamer-cougar-cratus-vidro-temperado', 'S', 'gab2.jpeg'),
(121, 67, 'Gabinete Gamer Aigo - Mid-t, Lat De Vidro', '$499,90', 'ALL STORE COMPUTING', 'NOVO', 'Junto ao seu incrível design, a DARKFLASH C285 possui entradas:\r\n1x USB 3.0, 1 x USB 2.0 e Entrada de HD Áudio, para maior comodidade.\r\n\r\nPossuindo um grande espaço interno para que monte seu setup sem se preocupar com a falta de espaços.\r\n\r\nRefrigere seu setup com até uma fan na parte traseira, possui suporte para placas mãe: Mini-ATX, Micro-ATX e ATX.\r\n', ' ', 'gabinete-gamer-aigo-mid-t-lat-de-vidro', 'S', 'gab3.jpeg'),
(122, 67, 'Gabinete PC Gamer - 4 Fans  Led Vidro Frontal', '$299,99', 'ALL STORE COMPUTING', 'NOVO', 'O gabinete GB1749 possui design moderno e elegante, agradando os gamers casuais e o público profissional. Painel frontal em Vidro Temperado e compatibilidade para até 3 fans de 120mm. Painel lateral em vidro temperado para exibir os componentes internos, espaço para a FONTE na parte de baixo deixo o calor longe de outros componentes importantes. Cobertura de fonte de alimentação em todo o comprimento do gabinete para uma aparência sóbria e para esconder os cabos.\r\n', ' ', 'gabinete-pc-gamer-4-fans-led-vidro-frontal', 'S', 'gab4.jpeg'),
(123, 67, 'Gabinete Simples Premium + Teclado E Mouse Usb', '$183,99', 'ALL STORE COMPUTING', 'NOVO', '- Dimensões: 300 x 165 x 350mm\r\n- Painel: 2x USB | Entrada de mic e áudio\r\n- Lateral: Aço\r\n\r\n- Placas de vídeo: até 22cm\r\n- Placas-mães: Micro ATX / Mini ATX\r\n- Baias: 2x 3.5” HD | 2x 2.5” SSD\r\n- PCIe: 4x Expansão\r\n- Fonte suportada: ATX\r\n', ' ', 'gabinete-simples-premium-teclado-e-mouse-usb', 'S', 'gab5.jpeg'),
(124, 67, 'Servidor Supermicro Rack Xeon - 32gb HD 2tb', '$2.999,96', 'ALL STORE COMPUTING', 'NOVO', 'Servidor ideal para ajudar sua empresa crescer, Os servidores Supermicro são versáteis e eficientes, ideais para pequenos e médios negócios, locais remotos e data centers, ele combina performance eficiente e grande capacidade de armazenamento interno em uma plataforma de rack 1U ou torre. O servidores Supermicro acomodam uma grande variedade de cargas de trabalho e possibilita aumentar sua configuração de hard disk e memórias a um custo muito menor que outras marcas. Prepare sua empresa o futuro com opções flexíveis Supermicro.', ' ', 'servidor-supermicro-rack-xeon-32gb-hd-2tb', 'S', 'gab6.jpeg'),
(125, 67, 'Gabinete Supermicro Nas Servidor Mini Itx Cse-721', '$3.570,75', 'ALL STORE COMPUTING', 'NOVO', 'Gabinete Supermicro Nas Servidor mini Itx CSE-721-250B mini torre compacto\r\nideal para Storage Nas, servidor de backup, backplane hotswap para 4 hds, baixo consumo de energia.', ' ', 'gabinete-supermicro-nas-servidor-mini-itx-cse-721', 'S', 'gab7.jpeg'),
(126, 67, 'Gabinete Gamer Nzxt H7 Flow Pto Vidro Tem Mid', '$1.186,49', 'ALL STORE COMPUTING', 'NOVO', '1 x Porta USB 3.2 Gen 2 Tipo C\r\n2 x Portas USB 3.2 Gen 1 Tipo A\r\n1 x Conector áudio para auscultadores\r\nVelocidade: 1200 ± 240RPM\r\nFluxo de ar: 62,18 CFM\r\nPressão Estática: 1,05 mm-H2O\r\nRuído: 25,1 dBA\r\nConector de ventoinha: 3 pinos', ' ', 'gabinete-gamer-nzxt-h7-flow-pto-vidro-tem-mid', 'S', 'gab8.jpeg'),
(127, 77, 'Ssd Externo Win Memory 512 Gb - Usb', '$229,49', 'ALL STORE COMPUTING', 'NOVO', 'Capacidade: 512 GB\r\nSistema Operacional: Windows8 | Windows8.1 | Windows10 | Mac OS 10.13\r\nInterface: USB 3.2 Tipo-C Gen 2\r\nAcessórios: 01 cabo USB 3.2 Tipo C para A\r\nVelocidade de Leitura até 520 MB/s\r\nVelocidade de Gravação até 500 MB/s\r\nTemperatura de armazenamento - 20°C ~ 70°C\r\nTemperatura de operação 0°C ~ 70°C\r\nVoltagem de Operação DC 5V\r\nConsumo de Energia até 500 mA\r\nDimensões do Produto:\r\n(AxLxC): 7,6 x 4,6 x 1,12 cm\r\nPeso: 75g', ' ', 'ssd-externo-win-memory-512-gb-usb', 'S', 'ss1.jpeg'),
(128, 77, 'Disco sólido interno Kingston 240G - 240GB', '$120,00', 'ALL STORE COMPUTING', 'NOVO', 'Líder no mercado de tecnologia, a Kingston oferece uma grande variedade de dispositivos de armazenamento. Sua qualidade e especialização em discos de estado sólido (SSDs), de memória e de USB criptografadas a tornam uma das opções mais escolhidas no mercado internacional.', ' ', 'disco-solido-interno-kingston-240g-240gb', 'S', 'ss2.jpeg'),
(129, 77, 'Disco sólido interno SanDisk SSD Plus - 1TB', '$379,74', 'ALL STORE COMPUTING', 'NOVO', 'Se você procura aumentar o desempenho do seu computador, a linha SSD Plus da SanDisk é a indicada. Esta unidade de estado sólido melhora os tempos de inicialização e desligamento do sistema, também agiliza o acesso aos seus documentos digitais pessoais. Jogos?, atividades diárias de trabalho?, ou editar e reproduzir arquivos multimídia? Toda essa carga de trabalho é otimizada pelo dispositivo no seu PC, adicionado ao seu funcionamento silencioso e baixo consumo de energia.', ' ', 'disco-solido-interno-sandisk-ssd-plus-1tb', 'S', 'ss3.jpeg'),
(130, 77, 'Disco rígido externo Seagate Expansion - 12TB ', '$2.074,07', 'ALL STORE COMPUTING', 'NOVO', 'A Seagate, uma referência no mercado de unidades de armazenamento é responsável por fornecer os melhores produtos aos seus clientes. Seu controle de qualidade somado ao seu compromisso com a produção sustentável e responsável com o meio ambiente fazem dela uma líder indiscutível. Seus dispositivos destacam todas essas características que geram um desempenho ótimo, com o objetivo de lhe proporcionar uma ótima experiência de uso.\r\nO Expansion STEB12000400 é caracterizado pela sua eficiência e bom funcionamento, que juntamente com o seu baixo consumo de energia o tornam um disco indispensável para funções padrão.', ' ', 'disco-rigido-externo-seagate-expansion-12tb', 'S', 'ss4.jpeg'),
(131, 77, 'Disco rígido interno Seagate Savvio - 600GB', '$999,20', 'ALL STORE COMPUTING', 'NOVO', 'A Seagate, uma referência no mercado de unidades de armazenamento é responsável por fornecer os melhores produtos aos seus clientes. Seu controle de qualidade somado ao seu compromisso com a produção sustentável e responsável com o meio ambiente fazem dela uma líder indiscutível. Seus dispositivos destacam todas essas características que geram um desempenho ótimo, com o objetivo de lhe proporcionar uma ótima experiência de uso.\r\nO Savvio ST9600205SS é caracterizado pela sua eficiência e bom funcionamento, que juntamente com o seu baixo consumo de energia o tornam um disco indispensável para funções padrão.', ' ', 'disco-rigido-interno-seagate-savvio-600gb', 'S', 'ss5.jpeg'),
(132, 77, '2x Disco Rígido Interno Seagate Exos - X10 ', '$5.634,49', 'ALL STORE COMPUTING', 'NOVO', '- Baias de disco compatíveis: 1 a 8 baias\r\n- Tecnologia de gravação: CMR\r\n- Design do disco (ar ou hélio): Hélio\r\n- Taxa limite de carga de trabalho (WRL): 180\r\n- Sensor de vibração rotacional (VR): Sim \r\n- Controle de recuperação de erros: Sim\r\n- Máx. de transferência sustentada DE (MB/s): 210 MB/s\r\n- Velocidade de rotação (RPM): 7.200\r\n- Cache (MB): 256', ' ', '2x-disco-rigido-interno-seagate-exos-x10', 'S', 'ss6.jpeg'),
(133, 77, 'Hd Externo Portátil Slim 500gb + Cabo Usb', '$145,34', 'ALL STORE COMPUTING', 'NOVO', 'ARMAZENE SEUS ARQUIVOS, MUSICAS, VIDEOS, FOTOS E MUITO MAIS EM UM APARELHO COMPACTO E DE FÁCIL MANUSEIO. A CONEXÃO É PLUG AND PLAY, CONECTOU JÁ PODE COMEÇAR A USAR SEM NECESSIDADE DE INSTALAÇÃO.\r\n\r\nHD EXTERNO PORTÁTIL\r\nCAPACIDADE DE ARMAZENAMENTO: 500 GB\r\nCONEXÃO: USB\r\nACOMPANHA: CABO USB\r\n\r\nDIMENSÕES: COMPRIMENTO 12,5 - LARGURA 7,5 - ESPESSURA 1,2cm', ' ', 'hd-externo-portatil-slim-500gb-cabo-usb', 'S', 'ss7.jpeg'),
(134, 77, 'Hd Externo Seagate Backup Plus - 10tb Usb ', '$3.099,16', 'ALL STORE COMPUTING', 'NOVO', 'O disco é equipado com duas portas USB integradas na parte dianteira, então você pode fazer backup dos seus arquivos, fotos e vídeos preciosos, conectar e recarregar o seu tablet, smartphone ou câmera, mesmo se o sistema estiver desligado ou em modo de inatividade.\r\n\r\n\r\nSeus arquivos, fotos e vídeos favoritos podem ser armazenados em backup do seu PC usando um software de backup para download da Seagate.\r\n\r\n\r\nÉ fácil usar os discos Backup Plus de forma intercambiável com computadores PC e Mac, sem precisar reformatar. Basta instalar os drivers NTFS no Mac e pronto.\r\n', ' ', 'hd-externo-seagate-backup-plus-10tb-usb', 'S', 'ss8.jpeg'),
(135, 70, 'Headset Gamer Sem Fio Havit - Drivers 50mm', '$439,56', 'ALL STORE COMPUTING', 'NOVO', 'Experimente a adrenalina de mergulhar na cena de outra maneira! Ter fones de ouvido específicos para jogos muda completamente sua experiência. Com os Havit H2015G, você não perde nenhum detalhe e ouve o áudio como ele foi pensado pelos criadores.\r\n\r\nO desenho over-ear oferece um conforto incomparável graças às suas almofadas. Ao mesmo tempo, seu som surround do mais alto nível se torna o protagonista da cena.', ' ', 'headset-gamer-sem-fio-havit-drivers-50mm', 'S', 'fone1.jpeg'),
(136, 70, 'Headset Special Forces Desert Ps4/xone/pc', '$69,90', 'ALL STORE COMPUTING', 'NOVO', 'Faça parte das forças especiais que jogam com o headset do momento. Som surround 2.0, sensação de profundidade e design estiloso para você jogar, ouvir ou assistir com extremo conforto e máxima qualidade no som.\r\nEspecificações tecnicas:\r\n- Tecnologia Surround 2.0 3.5MM P3\r\n- Sensação de profundidade e grave otimizado.\r\n- Compatível com PC, PS4 e XBOXONE.\r\n- Impedância: 32ohms.\r\n- Potência máx. entrada: 20mw.\r\n- Freqüência:20Hz-20.000Hz.\r\n- Comprimento cabo:2.2 m.\r\n- Impedância:32ohms.\r\n- Sensibilidade:115dB - 1KHz.', ' ', 'headset-special-forces-desert-ps4-xone-pc', 'S', 'fone2.jpeg'),
(137, 70, 'Headset ver-ear gamer Havit - luz rgb LED', '$66,25', 'ALL STORE COMPUTING', 'NOVO', 'Experimente a adrenalina de mergulhar na cena de outra maneira! Ter fones de ouvido específicos para jogos muda completamente sua experiência. Com os Havit H2232D, você não perde nenhum detalhe e ouve o áudio como ele foi pensado pelos criadores.', ' ', 'headset-ver-ear-gamer-havit-luz-rgb-led', 'S', 'fone3.jpeg'),
(138, 70, 'Headset Gamer Led Mic P2- Xbox, Ps4, Pc, Celular', '$ 115 , 85', 'ALL STORE COMPUTING', 'NOVO', 'Experimente a adrenalina de mergulhar na cena de outra maneira! Ter fones de ouvido específicos para jogos muda completamente sua experiência. Com os Haiz HZ-K2, você não perde nenhum detalhe e ouve o áudio como ele foi pensado pelos criadores.', ' ', 'headset-gamer-led-mic-p2-xbox-ps4-pc-celular', 'S', 'fone4.jpeg'),
(139, 70, 'Headset Profissional Realwear Hmt1', '$22.990,02', 'ALL STORE COMPUTING', 'NOVO', 'Mantenha seus trabalhadores conectados independentemente do ambiente em que estejam. O RealWear HMT-1 é um equipamento vestível que conta com uma micro tela de alta resolução posicionada abaixo da linha de visão e tem visualização semelhante a uma tela de um tablet de 7”. Resistente a ambientes molhados, quentes, com poeira, muito barulho e perigosos, ele possibilita a equipes em campo a realização de suas atividades em segurança e sem perder a produtividade. Isso porque possui aplicativos de comunicação que permitem realizar ligações, compartilhamento de vídeo e de documentos com profissionais a distância. Por ser robusto ele aguenta quedas de até 1,5m a 2m. Permitindo assim que atividades como instalação de equipamentos, suporte técnico, inspeção de espaços e tantas outras possam ser concluídas em menos tempo e com mais assertividade.\r\n', ' ', 'headset-profissional-realwear-hmt1', 'S', 'fone5.jpeg'),
(140, 70, 'Headset Poly Voyager Focus Microsoft - Charge ', '$ 3.121 , ', 'ALL STORE COMPUTING', 'NOVO', 'Mantenha seu foco e produtividade o dia todo com o Headset Bluetooth Voyager Focus 2 213727-02 M.\r\n\r\nPossui três níveis de cancelamento de ruído, proporcionando uma experiência incrível de uma acústica única.\r\n\r\nOuça com mais clareza, mantenha você e sua voz sempre no foco de suas ligações, com a tecnologia Acoustic Fence, se cria uma bolha virtual sem nenhum ruído enquanto você fala.\r\n\r\nCom design moderno e muito confortável, pode ser usado facilmente durante um dia inteiro, pois possui uma tiara com alça superacolchoada e espumas macias.', '  ', 'headset-poly-voyager-focus-microsoft-charge', 'S', 'fone6.jpeg'),
(141, 70, 'Fone Headset Com Microfone Home Office ', '$99,19', 'ALL STORE COMPUTING', 'NOVO', 'Fone de ouvido com microfone headset, modelo USB, ideal para seu trabalho home office e call center, confortável pois possui seu protetor de ouvido em corino, arco ajustável, função mudo, controle de volume e microfone flexível.\r\nTodos nossos fones são testado antes do envio, proporcionando a você uma compra segura.', '  ', 'fone-headset-com-microfone-home-office', 'S', 'fone7.jpeg'),
(142, 71, 'Teclado Exbom BK-102 QWERTY - Português Brasil', '$27,04', 'ALL STORE COMPUTING', 'NOVO', 'Este teclado Exbom é o melhor complemento para fazer todos os tipos de atividades. É confortável e prático ao escrever documentos, navegar e pesquisar na Internet, seja no seu trabalho ou no conforto de casa.', ' ', 'teclado-exbom-bk-102-qwerty-portugues-brasil', 'S', 'te1.jpeg'),
(143, 71, 'Teclado Macally Ultra Slim Usb com fio', '$1.849,77', 'ALL STORE COMPUTING', 'NOVO', 'Teclado Macally Ultra Slim USB com fio com teclado numérico para Apple Mac Pro, MacBook Pro / Air, iMac, Mac Mini, laptops, laptops Windows Desktop, Silver (SLIMKEYPROA)\r\n\r\nDescrição do teclado independente\r\nTecnologia de conectividade USB\r\nRecursos especiais sem fio\r\nDispositivos compatíveis compatíveis com Apple Mac Pro / Mini, Macbook Pro / Air, iMac, laptop com Windows ou PC de mesa\r\nComponentes incluídos Teclado prata ultrafino USB, manual\r\nMarca Macally\r\nNome do modelo SLIMKEYPROA\r\nAlumínio prateado cor\r\nNúmero de chaves 104\r\nEstilo de teclado com fio - Alumínio\r\n\r\n104 teclas finas de tamanho completo para uma experiência de digitação confortável e\r\neficiente\r\nTeclas de tesoura para digitação suave e silenciosa\r\n16 teclas de atalho convenientes para controle de um toque de aplicativos Mac e indicadores LED para Num Lock, Cap Lock e teclas de atalho e atalho compatíveis com Windows\r\nPlug and Play via conexão de cabo USB com cabo USB de 59,1 \' (nenhum driver ou software necessário)\r\nUltra fino e de baixo perfil para economizar espaço na mesa para fácil armazenamento em uma grande gaveta de teclado', ' ', 'teclado-macally-ultra-slim-usb-com-fio', 'S', 'te2.jpeg'),
(144, 71, 'Teclado gamer Multilaser TC160 - Português Brasil ', '$36,53', 'ALL STORE COMPUTING', 'NOVO', 'Este teclado Multilaser de alto desempenho permite que você desfrute de horas ilimitadas de jogos. Foi especialmente desenvolvido para que você possa expressar suas habilidades e seu estilo. Melhore a sua experiência de jogo, seja você só um amador ou todo um especialista, e faça que suas jogadas atingam outro nível.', '  ', 'teclado-gamer-multilaser-tc160-portugues-brasil', 'S', 'hhh.jpeg'),
(145, 71, 'Teclado Mecânico Razer Blackwidow V3 Switch ', '$1.139,54', 'ALL STORE COMPUTING', 'NOVO', 'Desempenho fatal em um formato mais enxuto conheça o Razer BlackWidow V3 Tenkeyless. Dando continuidade a um legado icônico, este teclado para jogos compacto está armado com nossos mundialmente renomados Switches Mecânicos Razer e equipado com Razer Chroma RGB, para oferecer o nível de precisão e de personalização mais adorado pelos gamers de todo o mundo.\r\n', '  ', 'teclado-mecanico-razer-blackwidow-v3-switch', 'S', 'te4.jpeg'),
(146, 71, 'Teclado Mecânico Gamer Evolut Shodan - Red', '$166,99', 'ALL STORE COMPUTING', 'NOVO', 'O Teclado EG203RG SHODAN faz parte da linha da PRO da EVOLUT. Um super equipamento que não pode faltar no seu setup.\r\n\r\nA Linha PRO, foi desenvolvida para você que esta sempre buscando um passo a mais no seu desempenho. Possui auxílio de SOFTWARE EXCLUSIVO para controle total e personalizações dentro da jogatina. Sim, você vai detonar seus adversários com mais facilidade.', ' ', 'teclado-mecanico-gamer-evolut-shodan-red', 'S', 'te5.jpeg'),
(147, 71, 'Teclado Flexível Silicone - Notbook, PC, Tablet', '$55,90', 'ALL STORE COMPUTING', 'NOVO', 'Este teclado flexível, pode enrolar e colocar onde você quiser, é bem pratico para levar onde você for. Suas teclas são super macias e também acompanha o teclado numérico na lateral, para facilitar o seu dia a dia. Garanto que você nunca usou um deste, né ? rs. Por que não garante já o seu ? Não irá se arrepender.\r\n\r\nEle é de fácil higienização, fácil transporte e fácil uso. Basta conectar o cabo usb no seu pc ou notebook, onde desejar e já pode usar, sem precisar de instalações.\r\n', '  ', 'teclado-flexivel-silicone-notbook-pc-tablet', 'S', 'te6.jpeg'),
(148, 71, 'Teclado Gamer Wireless Steelseries  - Inglês', '$2.449,25', 'ALL STORE COMPUTING', 'NOVO', 'O teclado mais rápido e avançado do mundo funciona sem esforço para todos os negócios, quer você precise de pressionamentos de tecla mais rápidos em jogos para destruir a concorrência ou pressionamentos deliberados para digitar com precisão - o poder é seu.\r\nOs novos switches OmniPoint 2.0 usam sensores magnéticos de última geração para ativação instantânea sem um pressionamento de tecla para fornecer o que você deseja: velocidade.\r\nPrograme duas ações para uma única tecla, dependendo de como você a pressiona. Caminhe para a frente pressionando levemente uma tecla e, em seguida, corra pressionando a mesma tecla mais profundamente. Crie seus próprios combos avançados para ficar à frente da concorrência.', ' ', 'teclado-gamer-wireless-steelseries-ingles', 'S', 'te7.jpeg'),
(149, 71, 'Teclado bluetooth Satechi Slim - Inglês US ', '$512,90', 'ALL STORE COMPUTING', 'NOVO', 'Este teclado Satechi é o melhor complemento para fazer todos os tipos de atividades. É confortável e prático ao escrever documentos, navegar e pesquisar na Internet, seja no seu trabalho ou no conforto de casa.\r\n\r\nDistinção a toda cor\r\nSua retroiluminação lhe dá um toque diferente ao seu dispositivo e destaca sua composição quando é usado em espaços mal iluminados.', '  ', 'teclado-bluetooth-satechi-slim-ingles-us', 'S', 'te8.jpeg'),
(150, 73, 'Extensor Hdmi  Adaptador Cabo Rede - 60m', '$101,22', 'ALL STORE COMPUTING', 'NOVO', 'O hdmi extender possibilita a extensão do sinal hdmi de até 60 metros com qualidade full hd (1080p) via cabo cat 5e ou cat 6 rj45 o mesmo cabo de rede usado em pcs. suporta ainda a extensão via cabos hdmi num total de 10 metros (com 5 metros na entrada e 5 metros na saída). trabalha como amplificador de sinal, permitindo conectar cabos hdmi de 10 metros em sua entrada e na saída.', ' ', 'extensor-hdmi-adaptador-cabo-rede-60m', 'S', 'ad1.jpeg'),
(151, 81, 'Receptor Adaptador Usb Bluetooth - Plug And Play ', '$22,79', 'ALL STORE COMPUTING', 'NOVO', 'Ideal para conectar seu computador ou notebook a dispositivos bluetooth, como mouses, teclados e impressoras deixando um ambiente limpo e sem fios.\r\n ', '       ', 'receptor-adaptador-usb-bluetooth-plug-and-play', 'S', 'ad2.jpeg'),
(152, 81, 'Adaptador Rede Wi-fi TP-link - Plus Dual Band', '$130,64', 'ALL STORE COMPUTING', 'NOVO', 'Dual Band Wireless: banda de 2,4 GHz e 5 GHz fornece conectividade flexível, dando aos seus dispositivos acesso ao mais recentes roteadores Wi-Fi dual-band para maior velocidade e alcance.', ' ', 'adaptador-rede-wi-fi-tp-link-plus-dual-band', 'S', 'adap3.jpeg'),
(153, 81, ' Adaptador Conversor de Hdmi para Vídeo ', '$38,49', 'ALL STORE COMPUTING', 'NOVO', 'O adaptador conversor de HDMI para 3Rca 2AV é ideal para conectar aparelhos com Saída HDMI aos aparelhos mais antigos com entrada 3Rca 2AV, como televisões antigas dentre outros.\r\nExemplos de objetos a serem conectados: Consoles, TV Box, Projetores etc.\r\nO Mini conversor possui suporte NTSC e PAL.', ' ', 'adaptador-conversor-de-hdmi-para-video', 'S', 'adap4.jpeg'),
(154, 81, 'Adaptador TP-link Usb Wireless Mu-mimo - Archer ', '$269,76', 'ALL STORE COMPUTING', 'NOVO', 'TP-LINK Archer T4U é um adaptador USB wireless dual band AC que oferece a próxima geração de padrão Wi-Fi, 802.11ac, para todos os seus computadores, consolas de jogos e outros dispositivos compatíveis. O padrão 802.11ac é 3 vezes mais rápido do que os padrões mais antigos, tornando-o ideal para HD streaming e jogos on-line. Basta ligar o Archer T4U em uma porta USB e você pode desfrutar de até 867Mbps velocidades sem fio na banda de 5GHz cristalina ou até 300Mbps velocidades sem fio na faixa de 2,4 GHz.', '  ', 'adaptador-tp-link-usb-wireless-mu-mimo-archer', 'S', 'adappppp.jpeg');
INSERT INTO `produto` (`id_produto`, `id_categoria`, `titulo_produto`, `preco`, `autor`, `duracao`, `descricao`, `conteudo`, `slug_produto`, `ativo_produto`, `imagem_produto`) VALUES
(155, 80, 'Estabilizador de tensão Dcalu - 220V', '$1.450,34', 'ALL STORE COMPUTING', 'NOVO', 'Com este produto da Dcalu você poderá manter seu equipamento eletrônico seguro. Sua principal função é corrigir as variações de voltagem existentes na linha de energia. Graças a este dispositivo, a proteção contra danos ou perda de informação é garantida.\r\nAo ter um indicador LED, você poderá visualizar a funcionalidade do dispositivo, bem como observar alertas, processos e tarefas que são realizadas nele.', '  ', 'estabilizador-de-tensao-dcalu-220v', 'S', 'es1.jpeg'),
(156, 80, 'Estabilizador de tensão SMS - Revolution Speedy ', '$128,45', 'ALL STORE COMPUTING', 'NOVO', 'Com este produto da SMS você poderá manter seus equipamentos eletrônicos seguros quando ocorrerem alterações na rede elétrica. Graças a este dispositivo, a proteção contra danos ou perda de informações está garantida.\r\nCom este estabilizador você poderá manter seu equipamento eletrônico seguro. Sua principal função é corrigir as variações de voltagem existentes na linha de energia. Graças a este dispositivo, a proteção contra danos ou perda de informação é garantida.', ' ', 'estabilizador-de-tensao-sms-revolution-speedy', 'S', 'es2.jpeg'),
(157, 80, 'Protetor Eletrônico para PC - 330va 110 Mono', '$63,99', 'ALL STORE COMPUTING', 'NOVO', 'Sua função é proteger os equipamentos dos problemas oriundos da rede elétrica, fornecendo sempre energia limpa de interferência, proporcionando maior vida útil aos produtos a ele conectados.\r\n\r\nO Protetor dispõe de proteção contra choques elétricos, curto circuito, sobre corrente e surtos de tensão, além de proteger contra descargas atmosféricas. O Protetor não possui a função de estabilizar a rede elétrica (Não é um Estabilizador de Voltagem).', ' ', 'protetor-eletronico-para-pc-330va-110-mono', 'S', 'es3.jpeg'),
(158, 80, 'Estabilizador de tensão Upsai Pró Gel 3 ', '$389,49', 'ALL STORE COMPUTING', 'NOVO', 'Com este produto da Upsai você poderá manter seus equipamentos eletrônicos seguros quando ocorrerem alterações na rede elétrica. Graças a este dispositivo, a proteção contra danos ou perda de informações está garantida.\r\n\r\nCom este produto da Upsai você poderá manter seu equipamento eletrônico seguro. Sua principal função é corrigir as variações de voltagem existentes na linha de energia. Graças a este dispositivo, a proteção contra danos ou perda de informação é garantida.', ' ', 'estabilizador-de-tensao-upsai-pro-gel-3', 'S', 'es4.jpeg'),
(159, 80, 'Protetor Eletrônico 1500va Bivolt - PC Gamer', '$219,90', 'ALL STORE COMPUTING', 'NOVO', 'Sua função é proteger os equipamentos dos problemas oriundos da rede elétrica, fornecendo sempre energia limpa de interferência, proporcionando maior vida útil aos produtos a ele conectados. Este Protetor é indicado para: Computadores Gamers, Geladeira, TV, Frigobar, PDVs, leitores ópticos, informática, impressoras a tinta, produtos eletroeletrônicos, áudio, vídeo, som, telecomunicação, fax, PABX. O Protetor dispõe proteção contra choques elétricos, curto circuito, sobre corrente e surtos de tensão, além de proteger contra descargas atmosféricas. O Protetor não possui a função de estabilizar a rede elétrica.', ' ', 'protetor-eletronico-1500va-bivolt-pc-gamer', 'S', 'es5.jpeg'),
(160, 80, 'Estabilizador 1000va Bivolt SMS Progressive ', '$573,90', 'ALL STORE COMPUTING', 'NOVO', 'Com este produto da SMS você poderá manter seus equipamentos eletrônicos seguros quando ocorrerem alterações na rede elétrica. Graças a este dispositivo, a proteção contra danos ou perda de informações está garantida.\r\n\r\nA SMS é uma empresa líder na fabricação de equipamentos para a proteção de eletrônicos contra problemas da rede elétrica.\r\nOferece soluções para garantir a mais alta eficiência energética tanto nas indústrias quanto nos lares.', ' ', 'estabilizador-1000va-bivolt-sms-progressive', 'S', 'es6.jpeg'),
(161, 80, 'No break estabilizador de tensão SMS Station ', '$786,86 ', 'ALL STORE COMPUTING', 'NOVO', 'Com este produto da SMS você poderá manter seus equipamentos eletrônicos seguros quando ocorrerem alterações na rede elétrica. Graças a este dispositivo, a proteção contra danos ou perda de informações está garantida.\r\nCom este produto você poderá manter seu equipamento eletrônico seguro, pois corrige as variações de voltagem existentes na linha de energia. Graças a este dispositivo, a proteção contra danos ou perda de informações será garantida.', ' ', 'no-break-estabilizador-de-tensao-sms-station', 'S', 'es7.jpeg'),
(162, 80, 'Estabilizador Eletrodoméstico Tripolar ', '$251,07', 'ALL STORE COMPUTING', 'NOVO', 'Informações gerais e recomendações\r\n- Não introduz distorção Harmônica (THD)\r\n- Luminoso que indica quando o produto está ligado\r\n- 115V - 17,4A\r\n- 5,19 Kg\r\n- 4 tomadas - Nova Norma - NBR14136', '  ', 'estabilizador-eletrodomestico-tripolar', 'S', 'es8.jpeg'),
(163, 74, 'Samsung Galaxy S22 Ultra (Snapdragon) 256 GB', '$5.048,49', 'ALL STORE COMPUTING', 'NOVO', 'Descubra infinitas possibilidades para suas fotos com as 4 câmeras principais de sua equipe. Teste sua criatividade e jogue com iluminação, diferentes planos e efeitos para obter ótimos resultados.\r\nPerfeito para quem gosta de fotos detalhadas. Seu zoom óptico lhe dará a possibilidade de ampliar sem perder qualidade de suas capturas.\r\n', ' ', 'samsung-galaxy-s22-ultra-snapdragon-256-gb', 'S', 'der.jpeg'),
(164, 74, 'Tablet Microsoft Surface - Quad Core (2gb-64gb)', '$150,29', 'ALL STORE COMPUTING', 'USADO', 'Esse produto é recomendável para quem precisa de um dispositivo simples para acesso a internet como sites, emails, planilhas, entre outros. Não serve para assistir vídeos no Youtube, por exemplo, já que o sistema operacional não suporta e não é possível atualizá-lo.', ' ', 'tablet-microsoft-surface-quad-core-2gb-64gb', 'S', 'der2.jpeg'),
(165, 74, 'Impressora multifuncional Epson EcoTank - wifi ', '$547,85', 'ALL STORE COMPUTING', 'USADO', 'Imprima arquivos, digitalize documentos e faça todas as cópias que você precisa com esta impressora multifuncional da Epson, sempre pronta para facilitar sua rotina de trabalho ou estudo.', '  ', 'impressora-multifuncional-epson-ecotank-wifi', 'S', 'der3.jpeg'),
(166, 78, 'Webcam Home Ofice - com microfone (Teams, Zoom)', '$53,77', 'ALL STORE COMPUTING', 'NOVO', 'Webcam de boa qualidade, HD 1080P. Fique à vontade para perguntas, temos imenso prazer em ajudar e solucionar todas as dúvidas, ficamos a disposição no pós venda para regulagem ou dúvidas na instalação, podendo nos chamar pelas mensagens ou via WhatsApp.\r\n', '  ', 'webcam-home-ofice-com-microfone-teams-zoom', 'S', 'w.jpeg'),
(167, 78, 'Câmera web Viribus W80 Full HD 30FPS', '$104,26', 'ALL STORE COMPUTING', 'NOVO', 'Você não precisa mais se preocupar se o seu PC não tiver câmera. Este dispositivo da Viribus fornece a qualidade de imagem e os recursos que você precisa para se comunicar de forma fácil e eficaz na virtualidade.\r\n', ' ', 'camera-web-viribus-w80-full-hd-30fps', 'S', 'w2.jpeg'),
(168, 78, 'Câmera WebCam Multilaser - VGA ', '$28,71', 'ALL STORE COMPUTING', 'NOVO', 'Esta webcam oferece um microfone embutido, que permite capturar o som do ambiente. Você poderá desfrutar de conversas com alto-falante ou fones de ouvido, se estiver procurando mais privacidade.\r\nFazer uma videoconferência é mais fácil do que nunca. A tecnologia ligar e usar ou \"plug and play\" permite conectar a câmera ao computador sem precisar configurar ou oferecer parâmetros aos seus controladores.\r\n', ' ', 'camera-webcam-multilaser-vga', 'S', 'w3.jpeg'),
(169, 78, 'Câmera Webookers WB Full HD - 30FPS ', '$208,99', 'ALL STORE COMPUTING', 'NOVO', 'Você não precisa mais se preocupar se o seu PC não tiver câmera. Este dispositivo da Webookers WB fornece a qualidade de imagem e os recursos que você precisa para se comunicar de forma fácil e eficaz na virtualidade.', ' ', 'camera-webookers-wb-full-hd-30fps', 'S', 'w4.jpeg'),
(170, 78, 'Web Cam PC - Microfone preto/prata Box', '$79,99', 'ALL STORE COMPUTING', 'NOVO', 'Câmera para PC com lente 6P HD, microfone digital embutido. Distância de transmissão pode atingir cerca de 10 metros de rotação 360° graus. Ajuste de 33 ° para cima e para baixo, você pode ajustar o ângulo conforme necessário.', ' ', 'web-cam-pc-microfone-preto-prata-box', 'S', 'w5.jpeg'),
(171, 78, 'Webcam Brio 500 Full Hd - rose Logitech', '$607,92', 'ALL STORE COMPUTING', 'NOVO', 'A resolução Full HD 1080p e a correção de imagem facial baseada em IA, oferecem uma qualidade de imagem excepcional para as pessoas poderem ver você com mais clareza. Microfones com redução de ruídos que filtram o som de fundo, diminuindo o ruído ao seu redor. Use o novo e inovador modo de exibição para inclinar a câmera para baixo e apresentar rascunhos, trabalhos em andamento e outros objetos em sua mesa.\r\n', ' ', 'webcam-brio-500-full-hd-rose-logitech', 'S', 'w6.jpeg'),
(172, 78, 'Câmera web Logitech StreamCam Full - grafite', '$775,52', 'ALL STORE COMPUTING', 'NOVO', 'A Logitech é uma empresa suíça com alcance internacional que projeta produtos e experiências para acompanhar as atividades diárias das pessoas que a escolhem. Ao criar tecnologia, ela se concentra em como seus clientes se conectam e interagem com o mundo digital. Por isso, esta câmera pode ser muito útil no seu dia a dia.', ' ', 'camera-web-logitech-streamcam-full-grafite', 'S', 'w7.jpeg'),
(173, 78, 'Kit Webcam com microfone e caixa som', '$64,80', 'ALL STORE COMPUTING', 'NOVO', 'Design rotativo que você pode ajustar o ângulo como você gosta. Resolução 720p/ 1080P de alta definição e imagens de cores verdadeiras fornecem vídeo claro e suave.\r\nMicrofone de redução de ruído embutido para chamadas claras, sua voz pode ser ouvida com design livre de disco USB plug e jogar sem driver necessário.\r\nCompatível com WindowsXP/Win7/Win8/Win10.Adequado para o ensino on-line de vídeo conferência transmissão ao vivo chat etc.', '  ', 'kit-webcam-com-microfone-e-caixa-som', 'S', 'w8.jpeg'),
(174, 76, 'Placa de rede dual giga Intel 8 - 1000m', '$364,49', 'ALL STORE COMPUTING', 'NOVO', 'Placa de rede, Dual Giga, Intel, 82576EB, E1G42ET, PCI-e x1, 1000M, Conexão Ethernet, Gigabit, Rede de alta velocidade, Instalação interna, Desktop, Servidor, Conexão estável, Desempenho, Compatibilidade, Windows, Linux, Interface PCI-e, Dupla porta, LAN, Transmissão de dados, Comunicação, Acessório para computador, Expansão de rede, Conexão cabeada, Rede local.', ' ', 'placa-de-rede-dual-giga-intel-8-1000m', 'S', 'p.jpeg'),
(175, 76, 'Placa Rede Pci Express TP-link - Gigabit + Nfe', '$114,90', 'ALL STORE COMPUTING', 'NOVO', 'O Gigabit PCIeNetwork Adapter TG-3468 é um adaptador de alto desempenho projetado para o PCI Express Bus Architecture de alta velocidade. Projetado para suportar velocidades de rede 10/100/1000 Mbps com Auto Negociação, controle de fluxo 802.3x e Wake-on-LAN tecnologia. O TG-3468 Gigabit PCIe é um adaptador de rede Gigabit Ethernet altamente integrado e de baixo custo, que é uma ótima opção para atualizar sua rede.', ' ', 'placa-rede-pci-express-tp-link-gigabit-nfe', 'S', 'p1.jpeg'),
(176, 76, 'Placa De Rede Intel X520-da2 Dual 10gb Converged ', '$1.799,49', 'ALL STORE COMPUTING', 'NOVO', 'Sistemas operacionais suportados Windows Server 2012 R2*, Windows Server 2012*, Windows 8*, Windows Server 2008 R2*, Windows 7*, Windows Server 2008* SP2, Windows Vista* SP2, Windows Server 2003 R2*, Windows Server 2003* SP2, Linux* Stable Kernel version 3.x, 2.6,x, Red Hat Enterprise Linux* 5, 6, SUSE Linux Enterprise Server* 10, 11, FreeBSD 9*, , VMware ESX/ESXi*', ' ', 'placa-de-rede-intel-x520-da2-dual-10gb-converged', 'S', 'p2.jpeg'),
(177, 76, 'Placa Wireless Wifi 5ghz 867mbp para Notebook ', '$159,31', 'ALL STORE COMPUTING', 'NOVO', 'Placa Wireless Wifi intel dual band 2.4 GHz 5 GHz 867Mbps para Notebook Samsung RF411 Rv411\r\nCompatível com notebook com padrão conector placa Mini Pci-e conforme a foto 3 do anuncio, qualquer dúvida da compatibilidade fique a vontade para perguntar ao vendedor.)', ' ', 'placa-wireless-wifi-5ghz-867mbp-para-notebook', 'S', 'p3.jpeg'),
(178, 79, 'Placa de som Interface externa USB - volume Live ', '$100,62', 'ALL STORE COMPUTING', 'NOVO', 'Placa Externa Interface com áudio cristalino de alta resolução com som 7.1 HD para computadores, notebooks, vídeo games, para Lives e Gravações de áudio direto da câmera do seu Smartphone, com controle de volume, e botão mutação de voz!\r\nO legal dela é alta resolução de áudio, suportando sinais de entrada de 7.1 para uma verdadeira virtualização em realismo de feitos de jogos e sinais com precisão para os fones.', '   ', 'placa-de-som-interface-externa-usb-volume-live', 'S', 'oi.jpeg'),
(179, 79, 'Placa De Som Pci-e 1x Express CMI - 5.1', '$103,99', 'ALL STORE COMPUTING', 'NOVO', 'Pode ser instalada em todos modelos de Caixas de Som 5.1 com conexão analógica P2, onde os dois satélites Direitos, Esquerdos e SubWoofer são conectados em pares em portas P2.', ' ', 'placa-de-som-pci-e-1x-express-cmi-5-1', 'S', 'p2.jpeg'),
(180, 79, 'Placa De Som USB Áudio - PC e Notebook', '$87,23', 'ALL STORE COMPUTING', 'NOVO', 'USB 2.0 de alta velocidade.\r\n\r\nLED indicador de funcionamento.\r\n\r\nSom de alta qualidade.\r\n\r\nSistem de som 7.1 canais.\r\n\r\nBotão mudo para fone e microfone.\r\n\r\n2 Saídas de áudio para fone.\r\n\r\n2 Saídas de áudio para microfone.\r\n\r\nControle de volume.\r\n\r\nCompatível com USB 1.1, 2.0 e 3.0.\r\n\r\nPlug and Play.\r\n\r\nModo “USB Bus-Powered”.\r\n\r\nNão requer alimentação externa.\r\n\r\nCompatível com : Windows XP/Vista/7/8/10.', '    ', 'placa-de-som-usb-audio-pc-e-notebook', 'S', 'bjrgfbnjf.jpeg'),
(181, 79, 'Placa De Som Game 4 Canais - 32bits Pci-express ', '$93,99', 'ALL STORE COMPUTING', 'NOVO', 'laca de som PCI EXPRESS 1X modelo DP-65, compatibilidade com Windows 10 / 8 / 7.\r\n\r\nCompatível com SLOTS PCI EXPRESS 1X / 4X / 8X / 16X.\r\n\r\nTemos o vídeo de apresentação do produto na última foto do anuncio, para ver o vídeo abra o anuncio em um PC.\r\n\r\nTemos os DRIVERS atualizados para este modelo, quando o produto chegar na sua casa, nos chame no pedido de compras, enviamos o LINK para download.', ' ', 'placa-de-som-game-4-canais-32bits-pci-express', 'S', 'ps.jpeg'),
(182, 74, 'Fonte Carregador Universal Notebook - 09 Conectores ', '$119,90', 'ALL STORE COMPUTING', 'NOVO', 'Bivolt Possui 9 conectores - 8 móveis, e 1 fixo Saída USB - Permite carregar dispositivos Notebooks compatíveis: Acer, Ams Tech, Asus, BenQ Compaq, Dell, Fujitsu, Gateway, hasee, hitachi, Hp, Ibm, Lenovo, Lg, Nec, Panasonic, Samsumg, Sharp, Sony, Toshiba Corrente máxima de entrada: 1A Corrente máxima de saída? 4,5 A Proteção contra curto circuito e sobrecarga Saídas: 12V, 15V, 16V, 18V, 19V, 19V, 20V / 4,5A Max E 24V / 3,75A Max, SAÍDA USB 5V Frequência de Operação: 50 / 60Hz.', ' ', 'fonte-carregador-universal-notebook-09-conectores', 'S', 'carr.jpeg'),
(183, 74, 'Suporte base Notebook - refrigeração com Led', '$78,90', 'ALL STORE COMPUTING', 'NOVO', 'Tenha seguranca, comodidade e praticidade enquanto utiliza o seu notebook com a base refrigerada NBC-50 da C3Tech! Oferece diversas possibilidades de inclinacao do notebook, proporcionando melhor angulo de visao para longas horas de uso sem prejudicar suas maos, pescoco e coluna. Conta com 2 coolers fan que mantem o seu notebook na temperatura ideal, evitando superaquecimento e prolongando a vida util do seu equipamento.', '  ', 'suporte-base-notebook-refrigeracao-com-led', 'S', 'notttttt.jpeg'),
(184, 74, 'Sony PlayStation 5 825GB FIFA 23 - Bundle ', '$4.399,90', 'ALL STORE COMPUTING', 'NOVO', 'Com seu console PlayStation 5 você terá entretenimento garantido todos os dias. Sua tecnologia foi criada para colocar novos desafios para jogadores novatos e especialistas.\r\n\r\nO PlayStation renovou as expectativas do mundo virtual com este novo console e seu grande desempenho. Tem uma interface de usuário mais rápida e fácil de navegar do que os modelos anteriores. Além disso, você poderá jogar por horas desafiando milhões de oponentes em todo o mundo que estão esperando por novos desafios.', ' ', 'sony-playstation-5-825gb-fifa-23-bundle', 'S', 'fifa.jpeg'),
(185, 74, 'Apple iPhone 14 Pro Max (256 GB) - Roxo profundo', '$8.890,25', 'ALL STORE COMPUTING', 'NOVO', 'iPhone 14 Pro Max. Câmera grande-angular de 48 MP para capturar detalhes impressionantes. Dynamic Island, uma nova forma de interação no iPhone. Tela Sempre Ativa. E Detecção de Acidente(1), um novo recurso de segurança que liga para a emergência se você não puder.\r\n', ' ', 'apple-iphone-14-pro-max-256-gb-roxo-profundo', 'S', 'iphone.jpeg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administracao`
--
ALTER TABLE `administracao`
  ADD PRIMARY KEY (`id_administracao`);

--
-- Índices para tabela `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_carrinho`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `itens_venda`
--
ALTER TABLE `itens_venda`
  ADD PRIMARY KEY (`id_item`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administracao`
--
ALTER TABLE `administracao`
  MODIFY `id_administracao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `itens_venda`
--
ALTER TABLE `itens_venda`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

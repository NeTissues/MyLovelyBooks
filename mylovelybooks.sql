-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Nov-2017 às 19:25
-- Versão do servidor: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mylovelybooks`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_book`
--

CREATE TABLE IF NOT EXISTS `tb_book` (
  `bookId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `synopsis` varchar(10000) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `volumes` varchar(255) NOT NULL,
  `chapters` varchar(255) NOT NULL,
  `pages` int(11) NOT NULL,
  `score` double(2,2) NOT NULL,
  `categoryId` int(11) NOT NULL,
  PRIMARY KEY (`bookId`),
  KEY `Book_Category` (`categoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `tb_book`
--

INSERT INTO `tb_book` (`bookId`, `title`, `author`, `synopsis`, `publisher`, `volumes`, `chapters`, `pages`, `score`, `categoryId`) VALUES
(1, 'A CULPA É DAS ESTRELAS', 'John Green', 'Hazel é uma paciente terminal. Ainda que, \r\n		por um milagre da medicina, seu tumor tenha encolhido bastante — o que lhe dá a promessa de viver mais alguns anos —, \r\n		o último capítulo de sua história foi escrito no momento do diagnóstico. Mas em todo bom enredo há uma reviravolta, \r\n		e a de Hazel se chama Augustus Waters, um garoto bonito que certo dia aparece no Grupo de Apoio a Crianças com Câncer. \r\n		Juntos, os dois vão preencher o pequeno infinito das páginas em branco de suas vidas.', 'Intrinseca', 'Volume Único', '', 288, 0.00, 1),
(2, 'ORGULHO E PRECONCEITO', 'Jane Austen', 'Considerada a primeira romancista moderna da literatura inglesa, \r\n		Jane Austen começou seu segundo romance, ''Orgulho e Preconceito'', antes dos 21 anos de idade. Assim como em outras \r\n		obras de Austen, o livro é escrito de forma satírica. ''Orgulho e Preconceito'', pode ser considerado como especial \r\n		porque transcende o preconceito causado pelas falsas primeiras impressões e adentra no psicológico, mostrando como \r\n		o auto-conhecimento pode interferir nos julgamentos errôneos feitos a outras pessoasA autora revela certas e posturas \r\n		de seus personagens em situações cotidianas que, muitas vezes, causam momentos cômicos aos leitores, dando um caráter \r\n		mais leve e satírico ao livro. As emoções e sentimentos devem ser decifrados por quem decidir mergulhar na obra de Jane \r\n		Austen, uma vez que encobertos nas entrelinhas do texto. A escritora inglesa apresenta seu poder de expressar a \r\n		discriminação de maneira sutil e perspicaz em ''Orgulho e Preconceito''; ela é capaz de transmitir mensagens complexas \r\n		valendo-se de seu estilo a um tempo simples e espirituoso. O principal assunto do livro é contemplado logo na frase inicial,\r\n		quando a autora menciona que um homem solteiro e possuidor de grande fortuna deve ser o desejo de uma esposa. Com esta \r\n		citação, Jane Austen faz três referências importantes: a autora declara que o foco da trama será os relacionamentos e \r\n		os casamentos, dá um tom de humor á obra ao falar de maneira inteligente acerca de um tema comum, e prepara o leitor \r\n		para uma caçada de um marido em busca da esposa ideal e de uma mulher perseguindo pretendentes.O romance retrata a \r\n		relação entre Elizabeth Bennet (Lizzy) e Fitzwilliam Darcy na Inglaterra rural do século XVIII. Lizzy possui outras \r\n		quatro irmãs, nenhuma delas casadas, o que a Sra. Bennet, mãe de Lizzy, considera um absurdo. Quando o Sr. Bingley, \r\n		jovem bem sucedido, aluga uma mansão próxima da casa dos Bennet, a Sra. Bennet vê nele um possível marido para uma \r\n		de suas filhas. Enquanto o Sr. Bingley é visto com bons olhos por todos, o Sr. Darcy, por seu jeito frio, é mal falado. \r\n		Lizzy, em particular, desgosta imensamente dele, por ele ter ferido seu orgulho na primeira vez em que se encontram. \r\n		A recíproca não é verdadeira. Mesmo com uma má primeira impressão, Darcy realmente se encanta por Lizzy, sem que ela \r\n		saiba do fato. A partir daí o livro mostra a evolução do relacionamento entre eles e os que os rodeiam, mostrando também, \r\n		desse modo, a sociedade do final do século XVIII.Considerado a obra prima de Jane Austen, ''Orgulho e Preconceito'' ganhou \r\n		diversas versões para o cinema e televisão, a mais recente em 2005, com interpretações de Keira Knightley e Matthew Macfadyen \r\n		nos papéis principais.', 'Landmark', 'Volume Único', '', 576, 0.00, 1),
(3, 'A MENINA QUE ROUBAVA LIVROS', 'Markus Zusak', 'Quando a Morte conta uma história,\r\n		você deve parar para ler.\r\n\r\n		A trajetória de Liesel Meminger é contada por uma narradora mórbida, porém surpreendentemente \r\n		simpática. Ao perceber que a pequena ladra de livros lhe escapa, a Morte afeiçoa-se à menina \r\n		e rastreia suas pegadas de 1939 a 1943. Traços de uma sobrevivente: a mãe comunista, perseguida \r\n		pelo nazismo, envia Liesel e o irmão para o subúrbio pobre de uma cidade alemã, onde um casal se \r\n		dispõe a adotá-los em troca de dinheiro. O garoto morre no trajeto e é enterrado por um coveiro \r\n		que deixa cair um livro na neve. É o primeiro de uma série que a menina vai surrupiar ao longo \r\n		dos anos. Essa obra, que ela ainda não sabe ler, é seu único vínculo com a família.\r\n		Assombrada por pesadelos, ela compensa o medo e a solidão das noites com a cumplicidade do pai \r\n		adotivo, um pintor de parede bonachão que a ensina a ler. Em tempos de livros incendiados, o \r\n		gosto de roubá-los deu à menina uma alcunha e uma ocupação; a sede de conhecimento deu-lhe um \r\n		propósito.\r\n		A vida na rua Himmel é a pseudorrealidade criada em torno do culto a Hitler na Segunda Guerra. \r\n		Ela assiste à eufórica celebração do aniversário do Führer pela vizinhança. Teme a dona da loja \r\n		da esquina, colaboradora do Terceiro Reich. Faz amizade com um garoto obrigado a integrar a \r\n		Juventude Hitlerista. E ajuda o pai a esconder no porão um jovem judeu que escreve livros \r\n		artesanais para contar a sua parte naquela história. A Morte, perplexa diante da violência humana, \r\n		dá um tom leve e divertido à narrativa desse duro confronto entre a infância perdida e a crueldade \r\n		do mundo adulto, um sucesso absoluto — e raro — de crítica e público.', 'Intrinseca', 'Volume Único', '', 480, 0.00, 2),
(4, 'A CABANA', 'William P. Young', 'A filha mais nova de Mackenzie Allen Philip foi raptada \r\n		durante as férias em família e há evidências de que ela foi brutalmente assassinada e abandonada \r\n		numa cabana. Quatro anos mais tarde, Mack recebe uma nota suspeita, aparentemente vinda de Deus, \r\n		convidando-o para voltar áquele cabana para passar o fim de semana. Ignorando alertas de que \r\n		poderia ser uma cilada, ele segue numa tarde de inverno e volta a cenário de seu pior pesadelo. \r\n		O que encontra lá muda sua vida para sempre. Num mundo em que religião parece tornar-se irrelevante, \r\n		''A Cabana'' invoca a pergunta: ''Se Deus é tão poderoso e tão cheio de amor, por que não faz nada para \r\n		amenizar a dor e o sofrimento do mundo?'' As respostas encontradas por Mack surpreenderão você e, \r\n		provavelmente, o transformarão tanto quanto ele.', 'Arqueiro', 'Volume Único', '', 240, 0.00, 2),
(5, 'O SENHOR DOS ANÉIS', 'J. R. R. Tolkien', 'Numa cidadezinha indolente do Condado, um \r\n		jovem hobbit é encarregado de uma imensa tarefa. Deve empreender uma perigosa viagem através \r\n		da Terra-média até as Fendas da Perdição, e lá destruir o Anel do Poder - a única coisa que impede \r\n		o domínio maléfico do Senhor do Escuro.', 'Martins Fontes', 'Volume 1. Série O Senhor dos Anéis', '', 464, 0.00, 2),
(6, 'VIAJEM AO CENTRO DA TERRA', 'Júlio Verne', 'Numa pequena casa em um velho e tradicional \r\n		bairro de Hamburgo, o jovem Axel, tímido e inseguro, trabalha com seu tio, o irascível professor \r\n		Lidenbrock, geólogo, e sua discípula, a eficiência Graüben. \r\n		Em um velho manuscrito, Lidenbrock encontra um criptograma feito por Arne Saknussemm, célebre \r\n		cientista islandês do século XVI, com a bombástica revelação de que, pela chaminé da cratera do \r\n		extinto vulcão Sneffels, na Islândia, era possível penetrar até o centro da Terra e que ele - \r\n		Saknussemm - havia comprovado este fato.', 'L&PM', 'Volume 1. Série O Senhor dos Anéis', '', 240, 0.00, 2),
(7, 'ERAGON', 'Christopher Paolini', 'Eragon é uma história repleta de ação, vilões e locais \r\n		fantásticos, com dragões e elfos, cavaleiros, luta de espada, inesperadas revelações e uma linda \r\n		donzela. Inspirado em J.R.R. Tolkien, que criou idiomas para os diálogos de seus personagens, \r\n		Paolini utiliza o norueguês medieval para a linguagem dos elfos e inventa expressões específicas \r\n		para os anões e os urgals, de modo a dar veracidade ao lendário reino de Alagaësia, onde a guerra \r\n		está prestes a começar. \r\n\r\n		O protagonista é um jovem de 15 anos que, ao encontrar na floresta uma pedra azul polida, se vê \r\n		da noite para o dia no meio de uma disputa pelo poder do Império, na qual ele é a peça principal. \r\n		A vida de Eragon muda radicalmente ao descobrir que a pedra azul é, na realidade, um ovo de dragão. \r\n		Quando a pedra se rompe e dela nasce Saphira, Eragon é forçado a se converter em herói. \r\n\r\n		Involuntariamente, o jovem é lançado para um arriscado mundo novo movido pelas tramas do destino, \r\n		da magia e do poder. Empunhando apenas uma espada lendária e seguindo as sábias palavras de um velho \r\n		contador de histórias, Eragon e o leal dragão terão de se aventurar por terras perigosas e enfrentar \r\n		inimigos das trevas em um Império governado por um rei cuja maldade não conhece fronteiras. \r\n\r\n		A Eragon foi dada a responsabilidade de alcançar a glória dos lendários heróis da Ordem dos Cavaleiros \r\n		de Dragões. Será que conseguirá vencer os obstáculos que o destino lhe reservou? As escolhas de Eragon \r\n		poderão salvar – ou destruir – o mundo em que vive.', 'Rocco', 'Volume 1. Ciclo da Herança', '', 466, 0.00, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_category`
--

CREATE TABLE IF NOT EXISTS `tb_category` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_category`
--

INSERT INTO `tb_category` (`categoryId`, `category`) VALUES
(1, 'Romance'),
(2, 'Ficção'),
(3, 'Aventura');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_review`
--

CREATE TABLE IF NOT EXISTS `tb_review` (
  `idReview` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  `bookId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `score` double(2,2) NOT NULL,
  PRIMARY KEY (`idReview`),
  KEY `Reviews_Book` (`bookId`),
  KEY `Reviews_User` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_user`
--

INSERT INTO `tb_user` (`userId`, `name`, `email`, `password`, `photo`, `birth`) VALUES
(1, 'Gabriel Renato', 'gabrielRenato@email.com', 'padrao', 'https://trello-avatars.s3.amazonaws.com/da9a02875e77b6d38a4c3eb7aee81a07/original.png', '2017-11-27'),
(2, 'Julia Fernandes', 'juliaF@email.com', 'padrao', 'https://trello-avatars.s3.amazonaws.com/032d5a335361da4185924dc8155ecf36/170.png', '2017-11-27'),
(3, 'Thiago Morango', 'thiagoMorango@email.com', '', 'padrao', '2017-11-27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_book`
--

CREATE TABLE IF NOT EXISTS `user_book` (
  `idRelation` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `userPage` int(11) NOT NULL,
  `bookStatus` int(11) NOT NULL,
  PRIMARY KEY (`idRelation`),
  KEY `user_book_Book` (`bookId`),
  KEY `user_book_User` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `user_book`
--

INSERT INTO `user_book` (`idRelation`, `userId`, `bookId`, `userPage`, `bookStatus`) VALUES
(1, 1, 6, 16, 2),
(2, 1, 7, 4, 2),
(3, 1, 5, 0, 3),
(4, 2, 1, 288, 1),
(5, 2, 7, 466, 1),
(6, 2, 6, 24, 2),
(7, 2, 2, 0, 3),
(8, 2, 3, 0, 3),
(9, 3, 6, 16, 2),
(10, 3, 7, 466, 1),
(11, 3, 5, 0, 3);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_book`
--
ALTER TABLE `tb_book`
  ADD CONSTRAINT `Book_Category` FOREIGN KEY (`categoryId`) REFERENCES `tb_category` (`categoryId`);

--
-- Limitadores para a tabela `tb_review`
--
ALTER TABLE `tb_review`
  ADD CONSTRAINT `Reviews_User` FOREIGN KEY (`userId`) REFERENCES `tb_user` (`userId`),
  ADD CONSTRAINT `Reviews_Book` FOREIGN KEY (`bookId`) REFERENCES `tb_book` (`bookId`);

--
-- Limitadores para a tabela `user_book`
--
ALTER TABLE `user_book`
  ADD CONSTRAINT `user_book_User` FOREIGN KEY (`userId`) REFERENCES `tb_user` (`userId`),
  ADD CONSTRAINT `user_book_Book` FOREIGN KEY (`bookId`) REFERENCES `tb_book` (`bookId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

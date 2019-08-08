-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2017-08-28 20:26:11.33

-- tables
CREATE DATABASE mybooklist;
DROP DATABASE mybooklist;
USE mybooklist;

-- Table: Category
CREATE TABLE tb_category (
    categoryId int NOT NULL AUTO_INCREMENT,
    category varchar(255) NOT NULL,
    CONSTRAINT Category_pk PRIMARY KEY (categoryId)
);

-- Table: Book
CREATE TABLE tb_book (
    bookId int NOT NULL AUTO_INCREMENT,
    title varchar(255) NOT NULL,
    author varchar(255) NOT NULL,
    synopsis varchar(255) NOT NULL,
    publisher varchar(255) NOT NULL,
    volumes varchar(255) NOT NULL,
    chapters varchar(255) NOT NULL,
    pages int NOT NULL,
    score double(2,2) NOT NULL,
    categoryId int NOT NULL,
    CONSTRAINT Book_pk PRIMARY KEY (bookId)
);

-- Table: User
CREATE TABLE tb_user (
    userId int NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    photo blob NOT NULL,
    birth date NOT NULL,
    CONSTRAINT User_pk PRIMARY KEY (userId)
);

-- Table: Reviews
CREATE TABLE tb_review (
    idReview int NOT NULL AUTO_INCREMENT,
    text varchar(255) NOT NULL,
    bookId int NOT NULL,
    userId int NOT NULL,
    score double(2,2) NOT NULL,
    CONSTRAINT Reviews_pk PRIMARY KEY (idReview)
);

-- Table: user_book
CREATE TABLE user_book (
    idRelation int NOT NULL AUTO_INCREMENT,
    userId int NOT NULL,
    bookId int NOT NULL,
    userPage int NOT NULL,
    bookStatus int NOT NULL,
    CONSTRAINT user_book_pk PRIMARY KEY (idRelation)
);

-- foreign keys
-- Reference: Book_Category (table: Book)
ALTER TABLE tb_book ADD CONSTRAINT Book_Category FOREIGN KEY Book_Category (categoryId)
    REFERENCES tb_category (categoryId);

-- Reference: Reviews_Book (table: Reviews)
ALTER TABLE tb_review ADD CONSTRAINT Reviews_Book FOREIGN KEY Reviews_Book (bookId)
    REFERENCES tb_book (bookId);

-- Reference: Reviews_User (table: Reviews)
ALTER TABLE tb_review ADD CONSTRAINT Reviews_User FOREIGN KEY Reviews_User (userId)
    REFERENCES tb_user (userId);

-- Reference: user_book_Book (table: user_book)
ALTER TABLE user_book ADD CONSTRAINT user_book_Book FOREIGN KEY user_book_Book (bookId)
    REFERENCES tb_book (bookId);

-- Reference: user_book_User (table: user_book)
ALTER TABLE user_book ADD CONSTRAINT user_book_User FOREIGN KEY user_book_User (userId)
    REFERENCES tb_user (userId);

-- End of file.

-- inserts
-- Categorys
INSERT INTO tb_category (category) VALUES ("Romance");
INSERT INTO tb_category (category) VALUES ("Ficção");
INSERT INTO tb_category (category) VALUES ("Aventura");

-- Books
	-- Category: Romance
	INSERT INTO tb_book (title, author, synopsis, publisher, volumes, chapters, pages, score, categoryId)
		VALUES ("A CULPA É DAS ESTRELAS", "John Green", "Hazel é uma paciente terminal. Ainda que, 
		por um milagre da medicina, seu tumor tenha encolhido bastante — o que lhe dá a promessa de viver mais alguns anos —, 
		o último capítulo de sua história foi escrito no momento do diagnóstico. Mas em todo bom enredo há uma reviravolta, 
		e a de Hazel se chama Augustus Waters, um garoto bonito que certo dia aparece no Grupo de Apoio a Crianças com Câncer. 
		Juntos, os dois vão preencher o pequeno infinito das páginas em branco de suas vidas.", "Intrinseca", "Volume Único", 
		"", 288, 0, 1);
	INSERT INTO tb_book (title, author, synopsis, publisher, volumes, chapters, pages, score, categoryId)
		VALUES ("ORGULHO E PRECONCEITO", "Jane Austen", "Considerada a primeira romancista moderna da literatura inglesa, 
		Jane Austen começou seu segundo romance, 'Orgulho e Preconceito', antes dos 21 anos de idade. Assim como em outras 
		obras de Austen, o livro é escrito de forma satírica. 'Orgulho e Preconceito', pode ser considerado como especial 
		porque transcende o preconceito causado pelas falsas primeiras impressões e adentra no psicológico, mostrando como 
		o auto-conhecimento pode interferir nos julgamentos errôneos feitos a outras pessoasA autora revela certas e posturas 
		de seus personagens em situações cotidianas que, muitas vezes, causam momentos cômicos aos leitores, dando um caráter 
		mais leve e satírico ao livro. As emoções e sentimentos devem ser decifrados por quem decidir mergulhar na obra de Jane 
		Austen, uma vez que encobertos nas entrelinhas do texto. A escritora inglesa apresenta seu poder de expressar a 
		discriminação de maneira sutil e perspicaz em 'Orgulho e Preconceito'; ela é capaz de transmitir mensagens complexas 
		valendo-se de seu estilo a um tempo simples e espirituoso. O principal assunto do livro é contemplado logo na frase inicial,
		quando a autora menciona que um homem solteiro e possuidor de grande fortuna deve ser o desejo de uma esposa. Com esta 
		citação, Jane Austen faz três referências importantes: a autora declara que o foco da trama será os relacionamentos e 
		os casamentos, dá um tom de humor á obra ao falar de maneira inteligente acerca de um tema comum, e prepara o leitor 
		para uma caçada de um marido em busca da esposa ideal e de uma mulher perseguindo pretendentes.O romance retrata a 
		relação entre Elizabeth Bennet (Lizzy) e Fitzwilliam Darcy na Inglaterra rural do século XVIII. Lizzy possui outras 
		quatro irmãs, nenhuma delas casadas, o que a Sra. Bennet, mãe de Lizzy, considera um absurdo. Quando o Sr. Bingley, 
		jovem bem sucedido, aluga uma mansão próxima da casa dos Bennet, a Sra. Bennet vê nele um possível marido para uma 
		de suas filhas. Enquanto o Sr. Bingley é visto com bons olhos por todos, o Sr. Darcy, por seu jeito frio, é mal falado. 
		Lizzy, em particular, desgosta imensamente dele, por ele ter ferido seu orgulho na primeira vez em que se encontram. 
		A recíproca não é verdadeira. Mesmo com uma má primeira impressão, Darcy realmente se encanta por Lizzy, sem que ela 
		saiba do fato. A partir daí o livro mostra a evolução do relacionamento entre eles e os que os rodeiam, mostrando também, 
		desse modo, a sociedade do final do século XVIII.Considerado a obra prima de Jane Austen, 'Orgulho e Preconceito' ganhou 
		diversas versões para o cinema e televisão, a mais recente em 2005, com interpretações de Keira Knightley e Matthew Macfadyen 
		nos papéis principais.", "Landmark", "Volume Único", 
		"", 576, 0, 1);
	INSERT INTO tb_book (title, author, synopsis, publisher, volumes, chapters, pages, score, categoryId)
		VALUES ("A MENINA QUE ROUBAVA LIVROS", "Markus Zusak", "Quando a Morte conta uma história,
		você deve parar para ler.

		A trajetória de Liesel Meminger é contada por uma narradora mórbida, porém surpreendentemente 
		simpática. Ao perceber que a pequena ladra de livros lhe escapa, a Morte afeiçoa-se à menina 
		e rastreia suas pegadas de 1939 a 1943. Traços de uma sobrevivente: a mãe comunista, perseguida 
		pelo nazismo, envia Liesel e o irmão para o subúrbio pobre de uma cidade alemã, onde um casal se 
		dispõe a adotá-los em troca de dinheiro. O garoto morre no trajeto e é enterrado por um coveiro 
		que deixa cair um livro na neve. É o primeiro de uma série que a menina vai surrupiar ao longo 
		dos anos. Essa obra, que ela ainda não sabe ler, é seu único vínculo com a família.
		Assombrada por pesadelos, ela compensa o medo e a solidão das noites com a cumplicidade do pai 
		adotivo, um pintor de parede bonachão que a ensina a ler. Em tempos de livros incendiados, o 
		gosto de roubá-los deu à menina uma alcunha e uma ocupação; a sede de conhecimento deu-lhe um 
		propósito.
		A vida na rua Himmel é a pseudorrealidade criada em torno do culto a Hitler na Segunda Guerra. 
		Ela assiste à eufórica celebração do aniversário do Führer pela vizinhança. Teme a dona da loja 
		da esquina, colaboradora do Terceiro Reich. Faz amizade com um garoto obrigado a integrar a 
		Juventude Hitlerista. E ajuda o pai a esconder no porão um jovem judeu que escreve livros 
		artesanais para contar a sua parte naquela história. A Morte, perplexa diante da violência humana, 
		dá um tom leve e divertido à narrativa desse duro confronto entre a infância perdida e a crueldade 
		do mundo adulto, um sucesso absoluto — e raro — de crítica e público.", "Intrinseca", "Volume Único", 
		"", 480, 0, 2);		
	
	-- Category: Ficção	
	INSERT INTO tb_book (title, author, synopsis, publisher, volumes, chapters, pages, score, categoryId)
		VALUES ("A CABANA", "William P. Young", "A filha mais nova de Mackenzie Allen Philip foi raptada 
		durante as férias em família e há evidências de que ela foi brutalmente assassinada e abandonada 
		numa cabana. Quatro anos mais tarde, Mack recebe uma nota suspeita, aparentemente vinda de Deus, 
		convidando-o para voltar áquele cabana para passar o fim de semana. Ignorando alertas de que 
		poderia ser uma cilada, ele segue numa tarde de inverno e volta a cenário de seu pior pesadelo. 
		O que encontra lá muda sua vida para sempre. Num mundo em que religião parece tornar-se irrelevante, 
		'A Cabana' invoca a pergunta: 'Se Deus é tão poderoso e tão cheio de amor, por que não faz nada para 
		amenizar a dor e o sofrimento do mundo?' As respostas encontradas por Mack surpreenderão você e, 
		provavelmente, o transformarão tanto quanto ele.", "Arqueiro", "Volume Único", 
		"", 240, 0, 2);	
	INSERT INTO tb_book (title, author, synopsis, publisher, volumes, chapters, pages, score, categoryId)
		VALUES ("O SENHOR DOS ANÉIS", "J. R. R. Tolkien", "Numa cidadezinha indolente do Condado, um 
		jovem hobbit é encarregado de uma imensa tarefa. Deve empreender uma perigosa viagem através 
		da Terra-média até as Fendas da Perdição, e lá destruir o Anel do Poder - a única coisa que impede 
		o domínio maléfico do Senhor do Escuro.", "Martins Fontes", "Volume 1. Série O Senhor dos Anéis", 
		"", 464 , 0, 2);
	INSERT INTO tb_book (title, author, synopsis, publisher, volumes, chapters, pages, score, categoryId)
		VALUES ("VIAJEM AO CENTRO DA TERRA", "Júlio Verne", "Numa pequena casa em um velho e tradicional 
		bairro de Hamburgo, o jovem Axel, tímido e inseguro, trabalha com seu tio, o irascível professor 
		Lidenbrock, geólogo, e sua discípula, a eficiência Graüben. 
		Em um velho manuscrito, Lidenbrock encontra um criptograma feito por Arne Saknussemm, célebre 
		cientista islandês do século XVI, com a bombástica revelação de que, pela chaminé da cratera do 
		extinto vulcão Sneffels, na Islândia, era possível penetrar até o centro da Terra e que ele - 
		Saknussemm - havia comprovado este fato.", "L&PM", "Volume 1. Série O Senhor dos Anéis", 
		"", 240 , 0, 2);	

	-- Category: Aventura
	INSERT INTO tb_book (title, author, synopsis, publisher, volumes, chapters, pages, score, categoryId)
		VALUES ("ERAGON", "Christopher Paolini", "Eragon é uma história repleta de ação, vilões e locais 
		fantásticos, com dragões e elfos, cavaleiros, luta de espada, inesperadas revelações e uma linda 
		donzela. Inspirado em J.R.R. Tolkien, que criou idiomas para os diálogos de seus personagens, 
		Paolini utiliza o norueguês medieval para a linguagem dos elfos e inventa expressões específicas 
		para os anões e os urgals, de modo a dar veracidade ao lendário reino de Alagaësia, onde a guerra 
		está prestes a começar. 

		O protagonista é um jovem de 15 anos que, ao encontrar na floresta uma pedra azul polida, se vê 
		da noite para o dia no meio de uma disputa pelo poder do Império, na qual ele é a peça principal. 
		A vida de Eragon muda radicalmente ao descobrir que a pedra azul é, na realidade, um ovo de dragão. 
		Quando a pedra se rompe e dela nasce Saphira, Eragon é forçado a se converter em herói. 

		Involuntariamente, o jovem é lançado para um arriscado mundo novo movido pelas tramas do destino, 
		da magia e do poder. Empunhando apenas uma espada lendária e seguindo as sábias palavras de um velho 
		contador de histórias, Eragon e o leal dragão terão de se aventurar por terras perigosas e enfrentar 
		inimigos das trevas em um Império governado por um rei cuja maldade não conhece fronteiras. 

		A Eragon foi dada a responsabilidade de alcançar a glória dos lendários heróis da Ordem dos Cavaleiros 
		de Dragões. Será que conseguirá vencer os obstáculos que o destino lhe reservou? As escolhas de Eragon 
		poderão salvar – ou destruir – o mundo em que vive.", "Rocco", "Volume 1. Ciclo da Herança", 
		"", 466 , 0, 3);
		
-- Users
INSERT INTO tb_user (name, email, password, photo, birth) VALUES ("Gabriel Renato", "gabrielRenato@email.com", "padrao", "https://trello-avatars.s3.amazonaws.com/da9a02875e77b6d38a4c3eb7aee81a07/original.png", CURDATE());
INSERT INTO tb_user (name, email, password, photo, birth) VALUES ("Julia Fernandes", "JuliaF@email.com", "padrao", "https://trello-avatars.s3.amazonaws.com/032d5a335361da4185924dc8155ecf36/170.png", CURDATE());
INSERT INTO tb_user (name, email, password, photo, birth) VALUES ("Thiago Morango", "thiagoMorango@email.com", "","padrao", CURDATE());

-- User_Books
-- Gabriel
	INSERT INTO user_book ( userId, bookId, userPage, bookStatus) VALUES (1, 6, 16, 2);
	INSERT INTO user_book ( userId, bookId, userPage, bookStatus) VALUES (1, 7, 4, 2);
	INSERT INTO user_book ( userId, bookId, userPage, bookStatus) VALUES (1, 5, 0, 3);
-- Julia
	INSERT INTO user_book ( userId, bookId, userPage, bookStatus) VALUES (2, 1, 288, 1);
	INSERT INTO user_book ( userId, bookId, userPage, bookStatus) VALUES (2, 7, 466, 1);
	INSERT INTO user_book ( userId, bookId, userPage, bookStatus) VALUES (2, 6, 24, 2);
	INSERT INTO user_book ( userId, bookId, userPage, bookStatus) VALUES (2, 2, 0, 3);
	INSERT INTO user_book ( userId, bookId, userPage, bookStatus) VALUES (2, 3, 0, 3);
-- Morango
	INSERT INTO user_book ( userId, bookId, userPage, bookStatus) VALUES (3, 6, 16, 2);
	INSERT INTO user_book ( userId, bookId, userPage, bookStatus) VALUES (3, 7, 466, 1);
	INSERT INTO user_book ( userId, bookId, userPage, bookStatus) VALUES (3, 5, 0, 3);
	
-- HAUA
	INSERT INTO user_book ( userId, bookId, userPage, bookStatus) VALUES (4, 6, 16, 2);
	INSERT INTO user_book ( userId, bookId, userPage, bookStatus) VALUES (4, 7, 466, 1);
	INSERT INTO user_book ( userId, bookId, userPage, bookStatus) VALUES (4, 5, 0, 3);
    

    SELECT * FROM tb_user;
    SELECT * FROM tb_category;
	SELECT * FROM tb_book;

CREATE USER 'adm'@'localhost' IDENTIFIED BY '123';

GRANT ALL PRIVILEGES ON mybooklist.* TO 'adm'@'localhost' IDENTIFIED BY '123'; 
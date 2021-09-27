CREATE TABLE `contatos` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nacionalidade` varchar(100),
  `cidade` varchar(100),
  `cargo` varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
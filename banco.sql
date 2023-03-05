CREATE database 'cadastro';


CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `celular` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL
)

create database 'peca';

CREATE TABLE `produto` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `valor` int(200) NOT NULL,
  `categoria` int(200) NOT NULL,
  `obs` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL
)
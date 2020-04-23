-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Abr-2020 às 20:20
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nfe`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `observacao`
--

CREATE TABLE `observacao` (
  `id` int(11) NOT NULL,
  `ultima_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `observacao`
--

INSERT INTO `observacao` (`id`, `ultima_data`) VALUES
(1, '2020-04-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `codigo` int(11) NOT NULL,
  `id` varchar(100) DEFAULT NULL,
  `cod_athos` varchar(100) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `imagem` varchar(300) NOT NULL,
  `ultima_mod` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`codigo`, `id`, `cod_athos`, `nome`, `quantidade`, `imagem`, `ultima_mod`) VALUES
(1, '311', '2502', 'ARROZ GUIN LONGO 1KG', 31, 'guin_longo_1kg.jpg', '2020-04-18 18:26:05'),
(2, '9151', '340', 'ARROZ MOMIJI CURTO 1KG', 0, 'momiji_curto_1kg.jpg', '0000-00-00 00:00:00'),
(3, '131/151/8263', '343', 'ARROZ MOMIJI LONGO 1KG', 3, 'momiji_longo_1kg.jpg', '2020-04-18 18:24:38'),
(4, '8003', '1748', 'BALA GENGIBRE, MEL E PRÃ“POLIS 55G', 0, 'bala_gengibre_mel.jpg', '0000-00-00 00:00:00'),
(5, 'MOB 320', '1524', 'BARCO ISOPOR C/ TAMPA M', 13, 'barco_isopor.png', '2020-04-19 16:49:14'),
(6, '24243', '2718', 'BISC BOLINHO YOKOMIZO 270G', 0, 'yokomizo_leite.jpg', '0000-00-00 00:00:00'),
(7, '1976', '1024', 'BISC CHOCOBOY CHOCOCOGUMELO', 0, 'chocoboy.jpg', '0000-00-00 00:00:00'),
(8, 'BIS0003/30903/145', '429', 'BISC PALITO PEPERO ALMOND 32G', 7, 'pepero_almond.jpg', '2020-04-18 18:17:21'),
(9, 'BIS0001/24053/1002', '427', 'BISC PALITO PEPERO TRADICIONAL CHOCOLATE 47 G', 8, 'pepero_chocolate.jpg', '2020-04-18 18:16:59'),
(10, 'BIS0008T/24453', '409', 'BISC PALITO PEPERO WHITE COOKIE 32G', 7, 'pepero_cookie.jpg', '2020-04-18 18:17:03'),
(11, '1547/400BIS00165', '1058', 'BISC POCKY CHOCOLATE', 0, 'pocky_chocolate.jpg', '0000-00-00 00:00:00'),
(12, '600BIS00166/1742', '2415', 'BISC POCKY MORANGO', 1, 'pocky_morango.jpeg', '2020-04-11 16:02:11'),
(13, '2101', '3672', 'BISC.CHOCOPIE C/ 12', 0, 'chocopie_12.jpg', '0000-00-00 00:00:00'),
(14, '2102/4003', '2861', 'BISC.CHOCOPIE C/ 6 ', 1, 'chocopie_6.png', '2020-04-11 17:13:44'),
(16, 'BIS0004', '1023', 'BISC.KANCHO 42G +', 0, 'kancho.jpg', '0000-00-00 00:00:00'),
(17, '8008', '3156', 'BRONCOALHO 140G', 0, 'broncoalho.jpg', '0000-00-00 00:00:00'),
(18, '997/998', '3129', 'CAFÃ‰ CAPPUCCINO PREMIUM 240ML', 3, 'cappuccino_premium.jpg', '2020-04-18 17:38:57'),
(19, '997', '3103', 'CAFÃ‰ LATTE MOCHA 240ML', 2, 'latte_mocha.jpg', '2020-04-18 17:38:51'),
(20, '997/773', '3252', 'CAFÃ‰ LATTE PREMIUM 240ML', 0, 'latte_premium.png', '0000-00-00 00:00:00'),
(21, '3913', '58', 'CHÃ BANCHA YAMAMOTOYAMA 200G', 1, 'bancha_yamamotoyama.png', '2020-04-18 17:54:13'),
(22, '22123', '90', 'CHA DE GENGIBRE INST.150G ', 0, 'cha_gengibre.jpg', '0000-00-00 00:00:00'),
(23, 'CHA0002', '465', 'CHÃ DE GINSENG C/100 SACHES 300G', 0, 'ginseng_100.jpg', '0000-00-00 00:00:00'),
(24, 'CHA0002', '1269', 'CHA DE GINSENG C/50 SACHES 150G+', 0, 'ginseng_50.jpg', '0000-00-00 00:00:00'),
(26, '58', '94', 'CHÃ VERDE YAMAMOTOYAMA 200G', 1, 'chaverde_yamamotoyama.jpg', '2020-04-18 17:54:04'),
(27, '933/1383', '196', 'CHAMOJI (COLHER PARA ARROZ)', 1, 'chamoji.jpg', '2020-04-11 15:38:49'),
(28, '11113', '1867', 'CHICLETE FUSEN GUM LARANJA ORANGE+', 3, 'fusen_laranja.jpg', '2020-04-18 18:17:46'),
(29, '11103', '249', 'CHICLETE FUSEN GUM MELÃƒO MELON+', 3, 'fusen_melao.jpg', '2020-04-18 18:17:37'),
(30, '11083', '251', 'CHICLETE FUSEN GUM MORANGO ICHIGO+', 3, 'fusen_morango.jpg', '2020-04-18 18:17:30'),
(31, '11093', '250', 'CHICLETE FUSEN GUM UVA GRAPE+', 3, 'fusen_uva.png', '2020-04-18 18:17:42'),
(33, 'CJ-17', '1709', 'CHINELO JUNCO CJ-17 37/38+', 1, 'chinelo_junco_38.jpg', '2020-04-11 15:40:40'),
(34, '605100/603000', '3150', 'CHOGA GARI 1KG  ', 1, 'choga_gari_1kg.jpg', '2020-04-11 16:06:07'),
(35, '605100/603000', '3150', 'CHOGA GARI 1KG C/2', 0, 'choga_gari_1kg_2.jpg', '0000-00-00 00:00:00'),
(37, '2754/2838', '3424', 'DESINCHA SACHE', 0, 'desincha_dia.png', '0000-00-00 00:00:00'),
(38, '2868', '3735', 'DESINCHA 60 NOITES UNIT', 0, 'desincha_noite.png', '0000-00-00 00:00:00'),
(39, '723', '49', 'EBICEN CAMARÃƒO 60GR', 3, 'ebicen_camarao.jpg', '2020-04-18 18:16:23'),
(40, '6713', '1973', 'EBICEN CEBOLA 60GR', 3, 'ebicen_cebola.jpg', '2020-04-18 18:16:28'),
(41, '733', '2218', 'EBICEN GLICO FRANGO 80 GR', 2, 'glico_frango.jpg', '2020-04-18 18:16:16'),
(42, '1313', '12', 'EBICEN GLICO QUEIJO 80 GR', 2, 'glico_queijo.jpg', '2020-04-18 18:16:10'),
(43, '743', '81', 'EBICEN GLICO TOMATE 80 GR', 2, 'glico_tomate.jpg', '2020-04-18 18:16:05'),
(44, '302050/303750', '2577', 'EMB SUSHI I C/10 SHIKI 20 X 14', 0, 'sushi_i.jpg', '0000-00-00 00:00:00'),
(45, '302050/303750', '3373', 'EMB SUSHI I C/100 SHIKI 20 X 14', 0, 'sushi_i.jpg', '0000-00-00 00:00:00'),
(46, '302150/304350', '2580', 'EMB SUSHI II C/10 SHIKI 25 X 16', 0, 'sushi_ii.jpg', '0000-00-00 00:00:00'),
(47, '302150/304350', '2581', 'EMB SUSHI II C/50 SHIKI 25 X 16', 0, 'sushi_ii.jpg', '0000-00-00 00:00:00'),
(48, '303850/SK BG67', '3632', 'EMB.BIG BOAT (BARCO) SK BG67 C/1', 0, 'barco_sk_bg67.jpg', '0000-00-00 00:00:00'),
(49, '303850/SK BG67', '3634', 'EMB.BIG BOAT (BARCO) SK BG67 C/10', 0, 'barco_sk_bg67.jpg', '0000-00-00 00:00:00'),
(50, '303850/SK BG67', '3635', 'EMB.BIG BOAT (BARCO) SK BG67 C/50', 0, 'barco_sk_bg67.jpg', '0000-00-00 00:00:00'),
(51, '306450/SK-BGB/SK BG68', '2574', 'EMB.BIG BOAT (BARCO) SK BG68 C/1', 0, 'barco_sk_bg68.jpg', '0000-00-00 00:00:00'),
(52, '306450/SK-BGB/SK BG68', '2123', 'EMB.BIG BOAT (BARCO) SK BG68 C/10 UN', 0, 'barco_sk_bg68.jpg', '0000-00-00 00:00:00'),
(53, '2180', '2180', 'EMB.BIG BOAT (BARCO) SK BG68 C/50 UN', 0, 'barco_sk_bg68.jpg', '0000-00-00 00:00:00'),
(54, '306050/SK-BP 36', '3555', 'EMB.BOAT (BARCO) 26X12', 0, 'barco_26_12.jpg', '0000-00-00 00:00:00'),
(55, 'SK-00 BT 305050', '3375', 'EMBALAGEM SUSHI VI SHIKI C/10', 0, 'sushi_vi.png', '0000-00-00 00:00:00'),
(56, 'SK-00 BT 305050', '3376', 'EMBALAGEM SUSHI VI SHIKI C/50', 0, 'sushi_vi.png', '0000-00-00 00:00:00'),
(57, 'PT-920', '947', 'ENVELOPE MISSA GOREIZEN C/ 10 GOSHUGI BUKURO', 0, 'envelope_goreizen.jpg', '0000-00-00 00:00:00'),
(58, '531490', '3372', 'ESCORREDOR TELA PARA LAMEN INOX FL03-14 SHIKI', 1, 'escorredor_lamen.jpg', '2020-04-18 17:34:59'),
(59, '1563', '2506', 'ESCRITA NO NOSHIGAMI MISSA +++', 0, 'noshigami.jpg', '0000-00-00 00:00:00'),
(60, '009118/JK4', '2783', 'ESPETO ACR PRETO PERM 09CM C/ 50UN', 0, 'espeto_preto.png', '0000-00-00 00:00:00'),
(61, '412450/JS4', '2816', 'ESPETO ACR VERM BALÃƒO 12CM C/50', 0, 'espeto_vermelho.png', '0000-00-00 00:00:00'),
(62, '409560/409160', '2819', 'ESPETO APERITIVO 9CM C/50 PROM', 0, 'espeto_aperitivo.jpg', '0000-00-00 00:00:00'),
(63, '400270', '2786', 'ESPETO C/ BANDEIRA BRASIL 8CM C/ 50UN', 0, 'espeto_brasil.jpg', '0000-00-00 00:00:00'),
(64, '400770', '2787', 'ESPETO C/ BANDEIRA JAPÃƒO 8CM C/ 50UN', 0, 'espeto_japao.png', '0000-00-00 00:00:00'),
(65, '409120/17863', '2211', 'ESPETO C/ NÃ“ 09 CM C/ 50', 0, 'espeto_no.png', '0000-00-00 00:00:00'),
(66, '2423/824', '3732', 'ESTEIRA BAMBU SUDARE', 34, 'esteira_bambu.jpg', '2020-04-18 18:23:46'),
(67, '24973', '1906', 'FARINHA PANKO ALFA 1KG', 1, 'panko_1kg.jpg', '2020-04-18 17:52:59'),
(68, '30013', '2213', 'FARINHA PANKO ALFA 200G', 29, 'panko_200g.jpg', '2020-04-18 18:32:14'),
(69, '500390', '3418', 'FILTRO BOLA CHA INOX', 0, 'filtro_cha.jpg', '0000-00-00 00:00:00'),
(70, '7183', '541', 'FURIKAKE SANKAKU LEGUMES', 0, 'furikake_legumes.jpg', '0000-00-00 00:00:00'),
(71, '7213', '542', 'FURIKAKE SANKAKU KOZAKANA 36G', 0, 'furikake_peixe.jpg', '0000-00-00 00:00:00'),
(72, '7223', '532', 'FURIKAKE SANKAKU SHAKE', 0, 'furikake_sake.jpg', '0000-00-00 00:00:00'),
(73, '30053', '2031', 'GELATINA ALGA FRUTAS SORT C/ COCO 280G', 0, 'gelatina_sortido.jpg', '0000-00-00 00:00:00'),
(74, '30043', '2030', 'GELATINA DE ALGA  LICHIA C/ COCO 280G', 0, 'gelatina_coco.jpg', '0000-00-00 00:00:00'),
(75, '24553', '1394', 'GENGIBRE AÃ‡UC.60G', 0, 'gengibre_acucar.jpg', '0000-00-00 00:00:00'),
(76, '11383', '21', 'GERGELIM BRANCO TORRADO 100G', 28, 'gergelim_branco_torrado.jpg', '2020-04-18 18:29:43'),
(77, '19493', '27', 'GERGELIM PRETO TORRADO 100G', 29, 'gergelim_preto_torrado.jpg', '2020-04-18 18:29:44'),
(78, 'CHA0002/CHA0088', '1270', 'CHA DE GINSENG 3G UNIT', 0, 'ginseng.jpg', '0000-00-00 00:00:00'),
(79, '704', '211', 'GUINOMI (COPO PARA SAQUE) 5,5D X 5', 25, 'guinomi.jpg', '2020-04-19 16:51:47'),
(80, '3043', '1106', 'HARUSSAME REDE ROSA 200G+', 0, 'harussame.jpg', '0000-00-00 00:00:00'),
(81, '925', '206', 'HASHI COLORIDO 925', 0, 'hashi_colorido.jpg', '0000-00-00 00:00:00'),
(82, '25963/24403', '2299', 'HASHI DE BAMBU C/50', 11, 'hashi_bambu.jpg', '2020-04-18 18:15:04'),
(83, 'HAS0001/101100', '1134', 'HASHI DE MADEIRA C/40', 0, 'hashi_madeira.jpg', '0000-00-00 00:00:00'),
(84, '00002300/953', '292', 'HONDASHI 60G', 16, 'hondashi.jpg', '2020-04-18 18:14:32'),
(85, '16633', '3289', 'KARE GOLDEN CURRY FRACO 220 GR', 1, 'golden_fraco.jpg', '2020-04-11 16:05:01'),
(86, '3563', '3222', 'KARE GOLDEN CURRY MÃ‰DIO 220 GR', 2, 'golden_medio.jpg', '2020-04-11 16:34:44'),
(87, '990300', '3580', 'KIT HASHI PREMIUM 21CM C/ 20 SHIKI', 0, 'kit_hashi_premium.jpg', '0000-00-00 00:00:00'),
(88, '10553/BIS00132T', '3857', 'KOALA CHOCOLATE 168 GR', 0, 'koala_chocolate.jpg', '0000-00-00 00:00:00'),
(89, 'BIS00136', '3856', 'KOALA CHOCO BRANCO 37 G', 3, 'koala_chocolate_branco.jpg', '2020-04-11 15:41:58'),
(91, 'BIS00134', '3855', 'KOALA MORANGO 37 G', 3, 'koala_morango.jpg', '2020-04-11 15:42:13'),
(92, '1497', '3643', 'MAC INST SOON VEGGIE RAMYUN 112 GR', 0, 'lamen_veggie.jpg', '0000-00-00 00:00:00'),
(93, 'LAM0011/400LAM00117/18', '402', 'MAC INST YUKGUEJANG CUP 86 GR', 10, 'lamen_yukguejang.jpg', '2020-04-18 18:19:00'),
(94, '4962', '3778', 'MAC INST SAMYANG CARNE&VEGETAIS PICANTE 120GR', 0, 'lamen_samyang.jpg', '0000-00-00 00:00:00'),
(95, '3006', '3779', 'MAC INST SAMYANG HOT CHICKEN CARBONARA 130G', 9, 'lamen_carbonara.jpg', '2020-04-18 18:19:24'),
(96, '119', '3878', 'MAC INST SHRIMP CAMARÃƒO HOT COPO 67G', 3, 'lamen_camarao.jpg', '2020-04-18 18:18:23'),
(97, 'LAM0056/7', '1994', 'MAC INST NEOGURI HOT 120GR PICANTE', 4, 'lamen_neoguri_hot.jpg', '2020-04-19 16:56:39'),
(98, 'LAM0004T', '459', 'MAC INST NEOGURI MILD 120GR', 4, 'lamen_neoguri_mild.jpg', '2020-04-19 16:56:31'),
(99, 'LAM0013/1965', '420', 'MAC.INST.SHIN CUP 68G', 14, 'lamen_shin_cup.jpg', '2020-04-18 18:18:45'),
(100, '742', '3551', 'MAC INST NEOGURI COPO 62 GR', 17, 'lamen_neoguri_cup.jpg', '2020-04-18 18:18:33'),
(101, '8000LAM0010/17', '2308', 'MAC INST KIMCHI CUP 86G', 7, 'lamen_kimchi_cup.jpg', '2020-04-18 18:03:30'),
(102, '2723', '103', 'MACARRÃƒO YAKISSOBA ALFA 500G', 1, 'yakisoba_alfa.jpg', '2020-04-11 17:14:15'),
(103, '4711931120014', '234', 'MARSHMALLOW BLUEBERRY 100G', 0, 'marshmallow_blueberry.jpeg', '0000-00-00 00:00:00'),
(104, '1988', '1988', 'MARSHMALLOW CHOCOLATE 100G+', 0, 'marshmallow_chocolate.jpg', '0000-00-00 00:00:00'),
(105, '10363', '1986', 'MARSHMALLOW MORANGO 100G', 0, 'marshmallow_morango.jpg', '0000-00-00 00:00:00'),
(106, '087', '3751', 'MEL FLORADA EUCALIPTO BISNAGA 210G', 0, 'mel_eucalipto.png', '0000-00-00 00:00:00'),
(107, '077', '3752', 'MEL FLORADA LARANJEIRA BISNAGA 210G', 0, 'mel_laranjeira.jpg', '0000-00-00 00:00:00'),
(108, '1213', '1', 'MIRIM SAQUE AZUMA 500ML', 0, 'mirim_azuma.jpg', '0000-00-00 00:00:00'),
(109, '3540/673', '348', 'MISSO AKA SAKURA 1 KG', 2, 'misso_sakura_aka_1kg.jpg', '2020-04-11 15:28:35'),
(110, '3541/683', '560', 'MISSO AKA SAKURA 500G', 9, 'misso_aka_sakura_500g.jpg', '2020-04-18 18:14:02'),
(111, '000005', '3492', 'MISSO CASEIRO NIHON NO AJI 200G', 0, 'misso_caseiro_200g.png', '0000-00-00 00:00:00'),
(112, '000004', '3490', 'MISSO CASEIRO NIHON NO AJI 400G', 1, 'misso_caseiro_400g.png', '2020-04-11 16:16:38'),
(113, '000003', '3491', 'MISSO CASEIRO NIHON NO AJI 900G', 1, 'misso_caseiro_900g.png', '2020-04-18 17:51:51'),
(114, '3551', '2089', 'MISSOSHIRU INST.LEGUMES SAKURA 10G', 0, 'missoshiru_legumes.jpg', '0000-00-00 00:00:00'),
(115, '3550', '1948', 'MISSOSHIRU INST.TRADICIONAL SAKURA 10G', 0, 'missoshiru_tradicional.png', '0000-00-00 00:00:00'),
(116, '10643', '212', 'MISSOSHIRU WAKAME 12P 18GR', 0, 'missoshiru_12p.jpg', '0000-00-00 00:00:00'),
(117, '8813', '1215', 'MOLHEIRA DESCARTÃVEL C/10', 29, 'molheira_10.png', '2020-04-19 16:47:35'),
(118, '304850', '3820', 'MOLHEIRA DESCARTÃVEL C/1000 CX', 0, 'molheira_1000.png', '0000-00-00 00:00:00'),
(119, '24483', '1971', 'MOLHO SUKIYAKI MARUITI 500 ML', 0, 'molho_sukiyaki.jpg', '0000-00-00 00:00:00'),
(120, '2253', '2432', 'MOLHO TARE MARUITI 500 ML', 0, 'tare_maruiti.png', '0000-00-00 00:00:00'),
(121, '3634', '347', 'MOLHO TARÃŠ SAKURA 180ML', 29, 'tare_sakura.jpg', '2020-04-18 18:34:11'),
(122, '30243', '2742', 'MOLHO TONKATSU MARUITI 200ML', 0, 'tonkatsu_maruiti.png', '0000-00-00 00:00:00'),
(123, '8003', '97', 'MOLHO YAKISSOBA ALFA 500ML', 1, 'molho_yakisoba.jpg', '2020-04-11 17:14:25'),
(124, '6203', '3185', 'MORINGA OLEIFERA - - - ', 0, 'moringa.png', '0000-00-00 00:00:00'),
(125, '12773', '1049', 'MUPY MARACUJA 200ML', 0, 'mupy_maracuja.png', '0000-00-00 00:00:00'),
(126, '12783/7103', '1611', 'MUPY MORANGO 200ML', 0, 'mupy_morango.jpg', '0000-00-00 00:00:00'),
(127, '12803/10773', '1048', 'MUPY UVA 200ML', 0, 'mupy_uva.jpg', '0000-00-00 00:00:00'),
(128, 'NAM0001', '463', 'NAMA UDOM COM TEMPERO', 0, 'nama_udon_tempero.jpg', '0000-00-00 00:00:00'),
(129, 'ALG0051', '3494', 'NORI ALGA SUSHI  50FLS 140GR+', 1, 'nori_50fls.jpg', '2020-04-18 17:52:46'),
(130, 'ALG0051', '3494', 'NORI ALGA SUSHI  50FLS 140GR+ C/02', 0, 'nori_50fls.jpg', '0000-00-00 00:00:00'),
(131, 'ALG0051', '3494', 'NORI ALGA SUSHI  50FLS 140GR+ C/03', 0, 'nori_50fls.jpg', '0000-00-00 00:00:00'),
(132, '2502/2000ALG0050', '3354', 'NORI ALGA SUSHI 10FLS 28 GR', 68, 'nori_10fls.jpg', '2020-04-19 16:42:24'),
(133, '2000ALG0050', '3354', 'NORI ALGA SUSHI 10FLS 28GR C/02', 0, 'nori_10fls.jpg', '0000-00-00 00:00:00'),
(134, '2000ALG0050', '3354', 'NORI ALGA SUSHI 10FLS 28GR C/03', 0, 'nori_10fls.jpg', '0000-00-00 00:00:00'),
(136, '1563', '2506', 'NOSHIGAMI PAPEL P/ EMBRULHO MISSA C/01', 0, 'noshigami.jpg', '0000-00-00 00:00:00'),
(137, '1563', '2508', 'NOSHIGAMI PAPEL P/ EMBRULHO MISSA C/10', 0, 'noshigami.jpg', '0000-00-00 00:00:00'),
(138, '1563', 'â€“', 'NOSHIGAMI PAPEL P/ EMBRULHO MISSA C/30', 0, 'noshigami.jpg', '0000-00-00 00:00:00'),
(139, '1563', '2518', 'NOSHIGAMI PAPEL P/ EMBRULHO MISSA C/50//LANÃ‡AR COMO NOSHIGAMI MISSA 50 FL', 0, 'noshigami.jpg', '0000-00-00 00:00:00'),
(140, '793', '65', 'OKOSHI HIKAGE 100 GR', 0, 'okoshi_100g.jpg', '0000-00-00 00:00:00'),
(141, '3610/4953', '577', 'OLEO DE GERGELIM KENKO 100ML', 1, 'oleo_kenko_100ml.jpg', '2020-04-11 17:14:37'),
(142, '926/1483', '193', 'ONIGUIRI KATA', 0, 'oniguiri_kata.png', '0000-00-00 00:00:00'),
(143, '936/4343', '1544', 'OWAN S/T C/DES. VERMELHO', 5, 'owan_vermelho.jpg', '2020-04-11 16:04:35'),
(144, '401080', '2571', 'PALITO GUARDA CHUVA', 0, 'palito_guarda_chuva.jpg', '0000-00-00 00:00:00'),
(145, 'BIS0032T', '3863', 'BISC PEPERO AMENDOIM C/PRETZEL 32G', 14, 'pepero_amendoim.jpg', '2020-04-18 18:17:08'),
(146, '31623', '3106', 'BISC PEPERO CHOCO COOKIE', 3, 'pepero_choco_cookie.jpg', '2020-04-18 17:36:34'),
(147, 'BIS00235T', '3862', 'BISC PEPERO DOUBLE CHOCOLATE 50G', 6, 'pepero_double.jpg', '2020-04-18 18:17:14'),
(148, '2037', '2553', 'PORORO LEITE E  MORANGO 226ML', 0, 'pororo_morango.jpg', '0000-00-00 00:00:00'),
(149, '2040', '2749', 'PORORO LEITE E BLUEBERRY 226ML+++', 0, 'pororo_blueberry.jpg', '0000-00-00 00:00:00'),
(150, '462', '223', 'PORTA LÃPIS C/ DES.', 0, 'porta_lapis.png', '0000-00-00 00:00:00'),
(151, '3296', '3549', 'REFR. AMEIXA - PLUM SODA 350ML', 4, 'refri_ameixa.jpg', '2020-04-18 17:38:03'),
(152, '2199', '3415', 'REFR. MELANCIA SUBAK SODA 350ML', 5, 'refri_melancia.jpg', '2020-04-18 17:41:34'),
(153, '2374', '3449', 'REFR. MELÃƒO 355ML', 3, 'refri_melao.jpg', '2020-04-18 17:38:40'),
(154, '3278', '3784', 'REFR. SAKURA FLOR DE CEREJEIRA 350ML', 15, 'refri_sakura.jpg', '2020-04-18 18:06:30'),
(155, '236', '3550', 'REFRESCO DE PERA 238 ML', 0, 'suco_pera.jpg', '0000-00-00 00:00:00'),
(156, 'REF0008T', '1598', 'REFRESCO MORANGO COREANO', 0, 'suco_morango.jpg', '0000-00-00 00:00:00'),
(157, 'REF0008T', '398', 'REFR SUCO DE UVA C/PÃ‡S 238 ML', 0, 'suco_uva.jpg', '0000-00-00 00:00:00'),
(158, '7093', '130', 'ROSQ.C/ COCO SATS.150GR', 0, 'rosq_coco.jpg', '0000-00-00 00:00:00'),
(159, '7083', '47', 'ROSQ.C/AMENDOIM SATS.150G ', 0, 'rosq_amendoim.jpg', '0000-00-00 00:00:00'),
(160, '7073', '129', 'ROSQ.C/GERGELIM SATS.150G ', 0, 'rosq_gergelim.jpg', '0000-00-00 00:00:00'),
(161, '92', '3394', 'SALGADINHO CAMARÃƒO APIMENTADO HOT', 0, 'salg_camarao.jpg', '0000-00-00 00:00:00'),
(162, '1803', '3642', 'SALGADINHO CARANGUEJO', 0, 'salg_caranguejo.jpg', '0000-00-00 00:00:00'),
(163, '989', '3393', 'SALGADINHO CEBOLA APIMENTADO HOT', 0, 'salg_cebola_hot.jpg', '0000-00-00 00:00:00'),
(164, '89/89200SALG007/3233', '405', 'SALGADINHO CEBOLA ONION', 0, 'salg_cebola.jpg', '0000-00-00 00:00:00'),
(165, '96/96600SALG0003/4263', '423', 'SALGADINHO LULA CUTTLE FISH', 1, 'salg_lula.jpg', '2020-04-11 16:01:58'),
(166, '900SALG0006/94', '2469', 'SALGADINHO PALITO MEL HONEY', 10, 'salg_mel.png', '2020-04-18 18:06:40'),
(167, '88/005SALG0004/4273', '1942', 'SALGADINHO POLVO TAKO', 0, 'salg_polvo.jpg', '0000-00-00 00:00:00'),
(168, '1173', '23', 'SAQUE AZUMA KIRIM 600ML', 0, 'saque_azuma_kirim_600.jpg', '0000-00-00 00:00:00'),
(169, '16483', '2994', 'SAQUE AZUMA KIRIM DOURADO 175 ML', 1, 'saque_azuma_kirim_175.jpg', '2020-04-19 16:51:33'),
(170, '1183', '10', 'SAQUE AZUMA KIRIM DOURADO 740 ML', 0, 'saque_azuma_kirim_dourado_740.jpg', '0000-00-00 00:00:00'),
(174, '1833', '1108', 'SEMBEI SANKIO 200G', 0, 'sembei_sankio.jpg', '0000-00-00 00:00:00'),
(175, '22743', '228', 'SEMBEI SEAWEED NORI WANT WANT 136G', 0, 'seaweed_want_136g.jpg', '0000-00-00 00:00:00'),
(176, '22733/950133', '226', 'SEMBEI SHELLY WANT WANT 122G', 0, 'shelly_want_want_122.jpeg', '0000-00-00 00:00:00'),
(177, '21339', '270', 'SHOYU HINOMOTO 200ML', 0, 'shoyu_hinomoto_200.jpg', '0000-00-00 00:00:00'),
(178, '63502/3203', '555', 'SHOYU SAKURA 150ML', 30, 'shoyu_sakura_150.jpg', '2020-04-18 18:41:40'),
(179, '2166', '3396', 'SNACK ALGA MARINHA (WASABI) 10G', 1, 'snack_wasabi.jpg', '2020-04-11 15:31:05'),
(180, '1658', '2862', 'SNACK ALGA MARINHA (NATURAL) 10G+', 2, 'snack_natural.jpg', '2020-04-18 18:02:31'),
(181, '1660', '3202', 'SNACK ALGA MARINHA (ORIGINAL) 10G+', 2, 'snack_original.jpg', '2020-04-18 18:02:36'),
(182, '2043', '124', 'SOBA BAURU MEZZANI 500 GR', 0, 'soba_mezzani.jpg', '0000-00-00 00:00:00'),
(183, '1406', '2940', 'SOJU CHUM CHURUM 360,0 ML TAMPA VERDE  17,5%', 12, 'soju_tampa_verde.jpg', '2020-04-18 18:01:31'),
(184, '4996', '3861', 'SOJU CHUM CHURUM BLUEBERRY 360ML', 6, 'soju_blueberry.jpg', '2020-04-18 17:58:24'),
(185, '1406/2302', '3802', 'SOJU CHUM CHURUM UVA 360ML', 9, 'soju_uva.jpg', '2020-04-18 17:58:18'),
(186, 'SOJU0001T', '2769', 'SOJU JINRO CHAMISUL CLASSIC 360ML TAMPA VERMELHO 20,1% HANARO', 0, 'soju_tampa_vermelha.jpg', '0000-00-00 00:00:00'),
(187, '927/2413', '35', 'SUSHI KATA (NIGUIRIZUSHI)', 28, 'niguirizushi_kata.png', '2020-04-18 18:45:16'),
(188, '2583', '3', 'TEMPERO PARA SUSHI AZUMA 750ML', 32, 'vinagra_azuma.jpg', '2020-04-19 16:51:01'),
(189, '118/LAM0085T', '2889', 'MAC INST TEMPURA UDON CUP 62 GR', 20, 'tempura_udon_cup.jpeg', '2020-04-18 18:17:57'),
(190, '2380', '3128', 'TSUKE TSUKE', 0, 'tsuke_tsuke.jpg', '0000-00-00 00:00:00'),
(191, '2483', '31', 'UDON ASSAI 500GR ', 0, 'udon_assai.jpg', '0000-00-00 00:00:00'),
(192, '8173', '131', 'UMEBOSHI CASA FORTE', 0, 'umeboshi_200g.jpg', '0000-00-00 00:00:00'),
(193, '3615/2593', '578', 'VINAGRE DE ARROZ KENKO 750ML', 0, 'vinagre_kenko.jpg', '0000-00-00 00:00:00'),
(194, '9004', '2853', 'VINAGRE DE CALDO DE CANA-DE-ACUCAR ORGÃ‚NICO 500ML', 0, 'vinagre_cana_organico.jpg', '0000-00-00 00:00:00'),
(195, '9002', '109', 'VINAGRE DE MAÃ‡A ORGÃ‚NICO 500ML SÃƒO FRANSCISCO', 0, 'vinagra_maca_organico.png', '0000-00-00 00:00:00'),
(196, '3493', '1997', 'WAKAME SEIWA 30G', 0, 'wakame_seiwa_30.jpg', '0000-00-00 00:00:00'),
(197, '17893/24403/100700', '1627', 'WARIBASHI BAMBU 01 PAR', 125, 'waribashi_1.jpg', '2020-04-19 16:56:17'),
(198, '17893/24403/100700', '1627', 'WARIBASHI BAMBU 01 PAR C/03', 0, 'waribashi_1.jpg', '2020-04-11 15:54:08'),
(199, '17893/24403/100700', '1627', 'WARIBASHI BAMBU 01 PAR C/06', 1, 'waribashi_1.jpg', '2020-04-11 15:46:08'),
(200, '20973', '1092', 'WASABI EM PASTA GLOBO', 25, 'wasabi_globo.jpg', '2020-04-19 16:44:08'),
(203, '14633', '3273', 'KARE GOLDEN CURRY FORTE 220 GR', 0, 'golden_forte.jpg', '0000-00-00 00:00:00'),
(204, '3477', '3477', 'KARE GOLDEN CURRY FRACO 92 GR', 0, 'golden_fraco_92.jpg', '0000-00-00 00:00:00'),
(205, '5403', '3540', 'KARE GOLDEN CURRY MEDIO 92 GR', 2, 'golden_medio_92.jpg', '2020-04-18 18:04:34'),
(206, '3103', '1872', 'KARE GOLDEN CURRY FORTE 92 GR', 0, 'golden_forte_92.jpg', '0000-00-00 00:00:00'),
(208, '631', '631', 'MOEDOR DE GERGELIM', 0, 'moedor_gergelim.jpg', '0000-00-00 00:00:00'),
(210, '1253', '3206', 'TRENTO MASSIMO BRANCO COOKIE 30G', 0, 'trento_white_cookie.png', '0000-00-00 00:00:00'),
(211, '1216', '3149', 'TRENTO MASSIMO CHOC 30G', 0, 'trento_chocolate.png', '0000-00-00 00:00:00'),
(212, '1284', '3207', 'TRENTO MASSIMO PAÃ‡OCA 30G', 0, 'trento_pacoca.png', '0000-00-00 00:00:00'),
(213, '2882', '2882', 'BALA JELLY SWEET MORANGO 200G', 0, 'sweet_morango_200.jpg', '0000-00-00 00:00:00'),
(214, '1038', '1038', 'BALA JELLY SWEET 500G', 0, 'sweet_500.jpg', '0000-00-00 00:00:00'),
(216, '00BIS00167/1809', '2417', 'BISC POCKY GLICO BLUEBERRY', 0, 'pocky_blueberry.jpeg', '0000-00-00 00:00:00'),
(218, 'COD ATHOS 3825', '3825', 'BISC POCKY THIN', 0, 'pocky_thin.jpg', '0000-00-00 00:00:00'),
(219, 'CJ-17', '1710', 'CHINELO JUNCO CJ-17 39/40', 1, 'chinelo_junco_40.jpg', '2020-04-11 15:40:36'),
(220, '2494', '2494', 'MAC INST NEOGURI MILD 100', 0, 'lamen_neoguri_mild.jpg', '0000-00-00 00:00:00'),
(221, '127', '127', 'OWAN S/T C/DES PRETO', 2, 'owan_preto.jpg', '2020-04-18 18:14:23'),
(222, '4995', '3906', 'SOJU CHUM CHURUM MORANGO 360 ML', 2, '', '2020-04-18 17:53:19'),
(223, '69', '69', 'KAREKO CONDIMENTO INDIA 57G', 0, '', '0000-00-00 00:00:00'),
(224, '22873', '2708', 'GERGELIM BRANCO TORRADO CASA FORTE 500G', 0, '', '2020-04-11 17:15:11'),
(225, '2216', '3907', 'SOJU SODA TOK UVA 355 ML', 1, '', '2020-04-11 16:04:02'),
(226, '2753', '2753', 'BISC CHOCO KIT 36G', 0, '', '0000-00-00 00:00:00'),
(227, '2754', '2754', 'BISC CHOCO PICK 45G', 0, '', '0000-00-00 00:00:00'),
(228, '2430', '3975', 'YOPOKKI CUP CHEESE 120G', 0, '', '0000-00-00 00:00:00'),
(229, '2113', '3974', 'MAC INST SAMYANG HOT CHICKEN RAMEN 140G', 8, '', '2020-04-18 18:19:35'),
(230, '706', '3743', 'REFR MELÃƒO 350ML', 0, '', '0000-00-00 00:00:00'),
(231, 'CJ-17', '1708', 'CHINELO JUNCO CJ-17 35/36', 1, '', '2020-04-11 16:04:49'),
(232, 'BIS00136T', '3841', 'KOALA CHOCOLATE 37G', 13, '', '2020-04-18 18:06:05'),
(233, '7923', '1468', 'MUPY MISTO 200ML', 0, '', '0000-00-00 00:00:00'),
(234, '63500', '346', 'SHOYU TRADICIONAL  SAKURA 1 L', 0, '', '0000-00-00 00:00:00'),
(235, '311', '344', 'ARROZ GUIN 5 KG', 1, '', '2020-04-11 16:57:58'),
(236, 'COD ATHOS 407 //60BIS00111T/BIS00111', '407', 'BISC CHOCO PIE 168G LOTTE', 0, '', '0000-00-00 00:00:00'),
(237, '2213', '3987', 'SOJU CHUM CHURUM MAÃ‡A 360 ML', 5, '', '2020-04-18 17:58:15'),
(238, '417/600LAM0003T', '417', 'MAC INST NEOGURI 100G', 0, '', '0000-00-00 00:00:00'),
(239, '3744/5603/21177', '3744', 'SHOYU HINOMOTO TRADICIONAL 500ML', 0, '', '0000-00-00 00:00:00'),
(240, '1560', '1560', 'BISC. CHOCOPIE 30G', 1, '', '2020-04-11 16:03:09'),
(241, '21134', '256', 'SHOYU HINOMOTO 1 L', 0, '', '0000-00-00 00:00:00'),
(242, '1740', '3395', 'SNACK ALGA MARINHA TERIYAKI', 3, '', '2020-04-18 18:02:42'),
(243, '2181', '4021', 'MAC INST SAMYANG EXTREME SPICY 140G', 16, '', '2020-04-18 18:07:44'),
(244, '3546/3163', '554', 'MISSO SHIRO SAKURA 500G', 4, '', '2020-04-18 18:05:43'),
(245, '1036', '1769', 'REFR SUCO MORANGO C/PÃ‡S 235ML+', 0, '', '0000-00-00 00:00:00'),
(246, '2433', '4022', 'YOPOKKI PACK CHEESE 240G', 9, '', '2020-04-18 17:52:08'),
(247, 'LAM0002T', '3998', 'MACARRÃƒO INST ANSUNG 100 G', 9, '', '2020-04-18 18:06:22'),
(248, '12153', '1574', 'BALA JELLY SWEET 60 G', 10, '', '2020-04-18 18:07:01'),
(249, '24403/100700/100701', '1135', 'WARIBASHI HASHI BAMBU C/50 PARES', 16, '', '2020-04-19 16:45:53'),
(250, '101700', '1965', 'WARIBASHI HASHI BAMBU C/ 100', 1, '', '2020-04-19 16:55:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `observacao`
--
ALTER TABLE `observacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `observacao`
--
ALTER TABLE `observacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

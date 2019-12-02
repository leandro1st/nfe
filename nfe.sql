-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Dez-2019 às 20:04
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
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `codigo` int(11) NOT NULL,
  `id` varchar(100) DEFAULT NULL,
  `nome` varchar(200) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `imagem` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`codigo`, `id`, `nome`, `quantidade`, `imagem`) VALUES
(1, '311', 'ARROZ GUIN LONGO 1KG', 8, 'guin_longo_1kg.jpg'),
(2, '9151', 'ARROZ MOMIJI CURTO 1KG', 6, 'momiji_curto_1kg.jpg'),
(3, '131/151/8263', 'ARROZ MOMIJI LONGO 1KG', 0, 'momiji_longo_1kg.jpg'),
(4, '8003', 'BALA GENGIBRE, MEL E PRÃ“POLIS 55G', 0, 'bala_gengibre_mel.jpg'),
(5, 'MOB 320', 'BARCO ISOPOR C/ TAMPA M', 3, 'barco_isopor.png'),
(6, '24243', 'BISC BOLINHO YOKOMIZO 270G', 0, 'yokomizo_leite.jpg'),
(7, '1976', 'BISC CHOCOBOY CHOCOCOGUMELO', 0, 'chocoboy.jpg'),
(8, 'BIS0003/30903/145', 'BISC PALITO PEPERO ALMOND 32G', 8, 'pepero_almond.jpg'),
(9, 'BIS0001/24053/1002', 'BISC PALITO PEPERO CHOCOLATE 47G', 12, 'pepero_chocolate.jpg'),
(10, 'BIS0008T/24453', 'BISC PALITO PEPERO WHITE COOKIE 32G', 13, 'pepero_cookie.jpg'),
(11, '1547/400BIS00165', 'BISC POCKY CHOCOLATE', 14, 'pocky_chocolate.jpg'),
(12, '600BIS00166/1742', 'BISC POCKY MORANGO', 15, 'pocky_morango.jpeg'),
(13, '2101', 'BISC.CHOCOPIE C/ 12', 0, 'chocopie_12.jpg'),
(14, '2102/4003', 'BISC.CHOCOPIE C/ 6 ', 2, 'chocopie_6.png'),
(16, 'BIS0004', 'BISC.KANCHO 42G +', 1, 'kancho.jpg'),
(17, '8008', 'BRONCOALHO 140G', 0, 'broncoalho.jpg'),
(18, '997/998', 'CAFÃ‰ CAPPUCCINO PREMIUM 240ML', 1, 'cappuccino_premium.jpg'),
(19, '997', 'CAFÃ‰ LATTE MOCHA 240ML', 1, 'latte_mocha.jpg'),
(20, '997/773', 'CAFÃ‰ LATTE PREMIUM 240ML', 0, 'latte_premium.png'),
(21, '3913', 'CHÃ BANCHA YAMAMOTOYAMA 200G', 0, 'bancha_yamamotoyama.png'),
(22, '22123', 'CHA DE GENGIBRE INST.150G ', 0, 'cha_gengibre.jpg'),
(23, 'CHA0002', 'CHÃ DE GINSENG C/100 SACHES 300G', 0, 'ginseng_100.jpg'),
(24, 'CHA0002', 'CHA DE GINSENG C/50 SACHES 150G+', 0, 'ginseng_50.jpg'),
(26, '58', 'CHÃ VERDE YAMAMOTOYAMA 200G', 0, 'chaverde_yamamotoyama.jpg'),
(27, '196', 'CHAMOJI (COLHER PARA ARROZ)', 0, 'chamoji.jpg'),
(28, '11113', 'CHICLETE FUSEN GUM LARANJA ORANGE+', 6, 'fusen_laranja.jpg'),
(29, '11103', 'CHICLETE FUSEN GUM MELÃƒO MELON+', 6, 'fusen_melao.jpg'),
(30, '11083', 'CHICLETE FUSEN GUM MORANGO ICHIGO+', 6, 'fusen_morango.jpg'),
(31, '11093', 'CHICLETE FUSEN GUM UVA GRAPE+', 6, 'fusen_uva.png'),
(33, 'CJ-17', 'CHINELO JUNCO CJ-17 37/38+', 4, 'chinelo_junco_38.jpg'),
(34, '605100/603000', 'CHOGA GARI 1KG  ', 1, 'choga_gari_1kg.jpg'),
(35, '605100/603000', 'CHOGA GARI 1KG C/2', 0, 'choga_gari_1kg_2.jpg'),
(37, '2754/2838', 'DESINCHA 60 DIA UNIT', 0, 'desincha_dia.png'),
(38, '2868', 'DESINCHA 60 NOITES UNIT', 0, 'desincha_noite.png'),
(39, '723', 'EBICEN CAMARÃƒO 60GR', 3, 'ebicen_camarao.jpg'),
(40, '6713', 'EBICEN CEBOLA 60GR', 3, 'ebicen_cebola.jpg'),
(41, '733', 'EBICEN GLICO FRANGO 80 GR', 2, 'glico_frango.jpg'),
(42, '1313', 'EBICEN GLICO QUEIJO 80 GR', 2, 'glico_queijo.jpg'),
(43, '743', 'EBICEN GLICO TOMATE 80 GR', 2, 'glico_tomate.jpg'),
(44, '302050/303750', 'EMB SUSHI I C/10 SHIKI 20 X 14', 0, 'sushi_i.jpg'),
(45, '302050/303750', 'EMB SUSHI I C/100 SHIKI 20 X 14', 0, 'sushi_i.jpg'),
(46, '302150/304350', 'EMB SUSHI II C/10 SHIKI 25 X 16', 1, 'sushi_ii.jpg'),
(47, '302150/304350', 'EMB SUSHI II C/50 SHIKI 25 X 16', 0, 'sushi_ii.jpg'),
(48, '303850/SK BG67', 'EMB.BIG BOAT (BARCO) SK BG67 C/1', 0, 'barco_sk_bg67.jpg'),
(49, '303850/SK BG67', 'EMB.BIG BOAT (BARCO) SK BG67 C/10', 0, 'barco_sk_bg67.jpg'),
(50, '303850/SK BG67', 'EMB.BIG BOAT (BARCO) SK BG67 C/50', 0, 'barco_sk_bg67.jpg'),
(51, '306450/SK-BGB/SK BG68', 'EMB.BIG BOAT (BARCO) SK BG68 C/1', 0, 'barco_sk_bg68.jpg'),
(52, '306450/SK-BGB/SK BG68', 'EMB.BIG BOAT (BARCO) SK BG68 C/10 UN', 1, 'barco_sk_bg68.jpg'),
(53, '2180', 'EMB.BIG BOAT (BARCO) SK BG68 C/50 UN', 0, 'barco_sk_bg68.jpg'),
(54, '306050/SK-BP 36', 'EMB.BOAT (BARCO) 26X12', 0, 'barco_26_12.jpg'),
(55, 'SK-00 BT 305050', 'EMBALAGEM SUSHI VI SHIKI C/10', 0, 'sushi_vi.png'),
(56, 'SK-00 BT 305050', 'EMBALAGEM SUSHI VI SHIKI C/50', 0, 'sushi_vi.png'),
(57, 'PT-920', 'ENVELOPE MISSA GOREIZEN C/ 10 GOSHUGI BUKURO', 0, 'envelope_goreizen.jpg'),
(58, '531490', 'ESCORREDOR TELA PARA LAMEN INOX FL03-14 SHIKI', 10, 'escorredor_lamen.jpg'),
(59, '1563', 'ESCRITA NO NOSHIGAMI MISSA +++', 0, 'noshigami.jpg'),
(60, '009118/JK4', 'ESPETO ACR PRETO PERM 09CM C/ 50UN', 0, 'espeto_preto.png'),
(61, '412450/JS4', 'ESPETO ACR VERM BALÃƒO 12CM C/50', 0, 'espeto_vermelho.png'),
(62, '409560/409160', 'ESPETO APERITIVO 9CM C/50 PROM', 0, 'espeto_aperitivo.jpg'),
(63, '400270', 'ESPETO C/ BANDEIRA BRASIL 8CM C/ 50UN', 0, 'espeto_brasil.jpg'),
(64, '400770', 'ESPETO C/ BANDEIRA JAPÃƒO 8CM C/ 50UN', 0, 'espeto_japao.png'),
(65, '409120/17863', 'ESPETO C/ NÃ“ 09 CM C/ 50', 0, 'espeto_no.png'),
(66, '2423/824', 'ESTEIRA BAMBU SUDARE', 11, 'esteira_bambu.jpg'),
(67, '24973', 'FARINHA PANKO ALFA 1KG', 1, 'panko_1kg.jpg'),
(68, '30013', 'FARINHA PANKO ALFA 200G', 14, 'panko_200g.jpg'),
(69, '500390', 'FILTRO BOLA CHA INOX', 0, 'filtro_cha.jpg'),
(70, '7183', 'FURIKAKE SANKAKU LEGUMES', 0, 'furikake_legumes.jpg'),
(71, '7213', 'FURIKAKE SANKAKU PEIXES', 0, 'furikake_peixe.jpg'),
(72, '7223', 'FURIKAKE SANKAKU SHAKE', 0, 'furikake_sake.jpg'),
(73, '30053', 'GELATINA ALGA FRUTAS SORT C/ COCO 280G', 0, 'gelatina_sortido.jpg'),
(74, '30043', 'GELATINA DE ALGA  LICHIA C/ COCO 280G', 0, 'gelatina_coco.jpg'),
(75, '24553', 'GENGIBRE AÃ‡UC.60G', 0, 'gengibre_acucar.jpg'),
(76, '11383', 'GERGELIM BRANCO TORRADO 100G', 12, 'gergelim_branco_torrado.jpg'),
(77, '19493', 'GERGELIM PRETO TORRADO 100G', 13, 'gergelim_preto_torrado.jpg'),
(78, 'CHA0002/CHA0088', 'GINSENG UNIT (DESINCHA KIT = 73%)', 0, 'ginseng.jpg'),
(79, '704', 'GUINOMI (COPO PARA SAQUE) 5,5D X 5', 30, 'guinomi.jpg'),
(80, '3043', 'HARUSSAME REDE ROSA 200G+', 0, 'harussame.jpg'),
(81, '925', 'HASHI COLORIDO 925', 1, 'hashi_colorido.jpg'),
(82, '25963/24403', 'HASHI DE BAMBU C/50', 12, 'hashi_bambu.jpg'),
(83, 'HAS0001/101100', 'HASHI DE MADEIRA C/40', 0, 'hashi_madeira.jpg'),
(84, '00002300/953', 'HONDASHI 60G', 2, 'hondashi.jpg'),
(85, '16633', 'KARE GOLDEN CURRY FRACO 220 GR', 0, 'golden_fraco.jpg'),
(86, '3563', 'KARE GOLDEN CURRY MÃ‰DIO 220 GR', 0, 'golden_medio.jpg'),
(87, '990300', 'KIT HASHI PREMIUM 21CM C/ 20 SHIKI', 0, 'kit_hashi_premium.jpg'),
(88, '10553/BIS00132T', 'KOALA CHOCOLATE GR', 0, 'koala_chocolate.jpg'),
(89, 'BIS00136', 'KOALA CHOCO BRANCO', 0, 'koala_chocolate_branco.jpg'),
(91, 'BIS00134', 'KOALA MORANGO', 0, 'koala_morango.jpg'),
(92, '1497', 'LAMEM SOON VEGGIE RAMYUN 112G', 0, 'lamen_veggie.jpg'),
(93, 'LAM0013', 'LAMEN YUKGUEJANG NONGSHIM 86G', 7, 'lamen_yukguejang.jpg'),
(94, '4962', 'LAMEN COREANO SABOR CARNE & VEGETAIS PICANTE SAMYANG', 2, 'lamen_samyang.jpg'),
(95, '3006', 'LAMEN COREANO SUPER PICANTE FRANGO E QUEIJO CREMOSO CARBONARA - 130G', 9, 'lamen_carbonara.jpg'),
(96, '119', 'MAC INST SHRIMP CAMARÃƒO HOT COPO 67G', 5, 'lamen_camarao.jpg'),
(97, 'LAM0056/7', 'MAC.INST.NEOGURI HOT 120GR PICANTE', 8, 'lamen_neoguri_hot.jpg'),
(98, 'LAM0004T', 'MAC.INST.NEOGURI MILD 120GR', 4, 'lamen_neoguri_mild.jpg'),
(99, 'LAM0013/1965', 'MAC.INST.SHIN CUP 68G', 29, 'lamen_shin_cup.jpg'),
(100, '742', 'MACARRÃƒO INST NEOGURI COPO 62GR', 20, 'lamen_neoguri_cup.jpg'),
(101, '8000LAM0010/17', 'MACARRAO INST.KIMCHI CUP 86GR', 3, 'lamen_kimchi_cup.jpg'),
(102, '2723', 'MACARRÃƒO YAKISSOBA ALFA 500G', 0, 'yakisoba_alfa.jpg'),
(103, '4711931120014', 'MARSHMALLOW BLUEBERRY 100G', 0, 'marshmallow_blueberry.jpeg'),
(104, '1988', 'MARSHMALLOW CHOCOLATE 100G+', 0, 'marshmallow_chocolate.jpg'),
(105, '10363', 'MARSHMALLOW MORANGO 100G', 0, 'marshmallow_morango.jpg'),
(106, '087', 'MEL FLORADA EUCALIPTO BISNAGA 210G', 1, 'mel_eucalipto.png'),
(107, '077', 'MEL FLORADA LARANJEIRA BISNAGA 210G', 0, 'mel_laranjeira.jpg'),
(108, '1213', 'MIRIM SAQUE AZUMA 500ML', 0, 'mirim_azuma.jpg'),
(109, '3540/673', 'MISSO AKA SAKURA 1 KG', 0, 'misso_sakura_aka_1kg.jpg'),
(110, '3541/683', 'MISSO AKA SAKURA 500G', 2, 'misso_aka_sakura_500g.jpg'),
(111, '000005', 'MISSO CASEIRO NIHON NO AJI 200G', 0, 'misso_caseiro_200g.png'),
(112, '000004', 'MISSO CASEIRO NIHON NO AJI 400G', 1, 'misso_caseiro_400g.png'),
(113, '000003', 'MISSO CASEIRO NIHON NO AJI 900G', 0, 'misso_caseiro_900g.png'),
(114, '3551', 'MISSOSHIRU INST.LEGUMES SAKURA 10G', 3, 'missoshiru_legumes.jpg'),
(115, '3550', 'MISSOSHIRU INST.TRADICIONAL SAKURA 10G', 3, 'missoshiru_tradicional.png'),
(116, '10643', 'MISSOSHIRU WAKAME 12P 18GR', 0, 'missoshiru_12p.jpg'),
(117, '8813', 'MOLHEIRA DESCARTÃVEL C/10', 12, 'molheira_10.png'),
(118, '304850', 'MOLHEIRA DESCARTÃVEL C/1000 CX', 0, 'molheira_1000.png'),
(119, '24483', 'MOLHO SUKIYAKI MARUITI 500 ML', 0, 'molho_sukiyaki.jpg'),
(120, '2253', 'MOLHO TARE MARUITI 500 ML', 0, 'tare_maruiti.png'),
(121, '3634', 'MOLHO TARÃŠ SAKURA 180ML', 12, 'tare_sakura.jpg'),
(122, '30243', 'MOLHO TONKATSU MARUITI 200ML', 0, 'tonkatsu_maruiti.png'),
(123, '8003', 'MOLHO YAKISSOBA ALFA 500ML', 0, 'molho_yakisoba.jpg'),
(124, '6203', 'MORINGA OLEIFERA - - - ', 0, 'moringa.png'),
(125, '12773', 'MUPY MARACUJA 200ML', 0, 'mupy_maracuja.png'),
(126, '12783/7103', 'MUPY MORANGO 200ML', 0, 'mupy_morango.jpg'),
(127, '12803/10773', 'MUPY UVA 200ML', 0, 'mupy_uva.jpg'),
(128, 'NAM0001', 'NAMA UDOM COM TEMPERO', 0, 'nama_udon_tempero.jpg'),
(129, 'ALG0051', 'NORI ALGA SUSHI  50FLS 140GR+', 1, 'nori_50fls.jpg'),
(130, 'ALG0051', 'NORI ALGA SUSHI  50FLS 140GR+ C/02', 0, 'nori_50fls.jpg'),
(131, 'ALG0051', 'NORI ALGA SUSHI  50FLS 140GR+ C/03', 0, 'nori_50fls.jpg'),
(132, '2502/2000ALG0050', 'NORI ALGA SUSHI 10FLS 28 GR', 19, 'nori_10fls.jpg'),
(133, '2000ALG0050', 'NORI ALGA SUSHI 10FLS 28GR C/02', 0, 'nori_10fls.jpg'),
(134, '2000ALG0050', 'NORI ALGA SUSHI 10FLS 28GR C/03', 0, 'nori_10fls.jpg'),
(136, '1563', 'NOSHIGAMI PAPEL P/ EMBRULHO MISSA C/01', 50, 'noshigami.jpg'),
(137, '1563', 'NOSHIGAMI PAPEL P/ EMBRULHO MISSA C/10', 0, 'noshigami.jpg'),
(138, '1563', 'NOSHIGAMI PAPEL P/ EMBRULHO MISSA C/30', 0, 'noshigami.jpg'),
(139, '1563', 'NOSHIGAMI PAPEL P/ EMBRULHO MISSA C/50//LANÃ‡AR COMO NOSHIGAMI MISSA 50 FL', 0, 'noshigami.jpg'),
(140, '793', 'OKOSHI HIKAGE 100 GR', 0, 'okoshi_100g.jpg'),
(141, '3610/4953', 'Ã“LEO DE GERGELIM KENKO 100ML', 0, 'oleo_kenko_100ml.jpg'),
(142, '926/1483', 'ONIGUIRI KATA', 0, 'oniguiri_kata.png'),
(143, '936/4343', 'OWAN S/T C/DES. VERMELHO', 0, 'owan_vermelho.jpg'),
(144, '401080', 'PALITO GUARDA CHUVA', 0, 'palito_guarda_chuva.jpg'),
(145, 'BIS0032T', 'PEPERO AMENDOIM C/PRETZEL 32G', 8, 'pepero_amendoim.jpg'),
(146, '31623', 'PEPERO CHOCO COOKIE', 0, 'pepero_choco_cookie.jpg'),
(147, 'BIS00235T', 'PEPERO DOUBLE CHOCOLATE 50G', 3, 'pepero_double.jpg'),
(148, '2037', 'PORORO LEITE E  MORANGO 226ML', 0, 'pororo_morango.jpg'),
(149, '2040', 'PORORO LEITE E BLUEBERRY 226ML+++', 0, 'pororo_blueberry.jpg'),
(150, '462', 'PORTA LÃPIS C/ DES.', 0, 'porta_lapis.png'),
(151, '3296', 'REFR. AMEIXA - PLUM SODA 350ML', 4, 'refri_ameixa.jpg'),
(152, '2199', 'REFR. MELANCIA SUBAK SODA 350ML', 6, 'refri_melancia.jpg'),
(153, '2374', 'REFR. MELÃƒO 355ML', 1, 'refri_melao.jpg'),
(154, '3278', 'REFR. SAKURA FLOR DE CEREJEIRA 350ML', 6, 'refri_sakura.jpg'),
(155, '3550', 'REFRESCO DE PERA 238 ML', 0, 'suco_pera.jpg'),
(156, 'REF0008T', 'REFRESCO MORANGO COREANO', 0, 'suco_morango.jpg'),
(157, 'REF0008T', 'REFRESCO UVA COREANO', 3, 'suco_uva.jpg'),
(158, '7093', 'ROSQ.C/ COCO SATS.150GR', 0, 'rosq_coco.jpg'),
(159, '7083', 'ROSQ.C/AMENDOIM SATS.150G ', 0, 'rosq_amendoim.jpg'),
(160, '7073', 'ROSQ.C/GERGELIM SATS.150G ', 1, 'rosq_gergelim.jpg'),
(161, '92', 'SALGADINHO CAMARÃƒO APIMENTADO HOT', 5, 'salg_camarao.jpg'),
(162, '1803', 'SALGADINHO CARANGUEJO', 0, 'salg_caranguejo.jpg'),
(163, '989', 'SALGADINHO CEBOLA APIMENTADO HOT', 3, 'salg_cebola_hot.jpg'),
(164, '89/89200SALG007/3233', 'SALGADINHO CEBOLA ONION', 3, 'salg_cebola.jpg'),
(165, '96/96600SALG0003/4263', 'SALGADINHO LULA CUTTLE FISH', 3, 'salg_lula.jpg'),
(166, '900SALG0006/94', 'SALGADINHO PALITO MEL HONEY', 0, 'salg_mel.png'),
(167, '88/005SALG0004/4273', 'SALGADINHO POLVO TAKO', 3, 'salg_polvo.jpg'),
(168, '1173', 'SAQUE AZUMA KIRIM 600ML', 0, 'saque_azuma_kirim_600.jpg'),
(169, '16483', 'SAQUE AZUMA KIRIM DOURADO 175 ML', 4, 'saque_azuma_kirim_175.jpg'),
(170, '1183', 'SAQUE AZUMA KIRIM DOURADO 740 ML', 0, 'saque_azuma_kirim_dourado_740.jpg'),
(174, '1833', 'SEMBEI SANKIO 200G', 1, 'sembei_sankio.jpg'),
(175, '22743', 'SEMBEI SEAWEED NORI WANT WANT 136G', 1, 'seaweed_want_136g.jpg'),
(176, '22733/950133', 'SEMBEI SHELLY WANT WANT 122G', 0, 'shelly_want_want_122.jpeg'),
(177, '21339', 'SHOYU HINOMOTO 200ML', 0, 'shoyu_hinomoto_200.jpg'),
(178, '63502/3203', 'SHOYU SAKURA 150ML', 13, 'shoyu_sakura_150.jpg'),
(179, '2166', 'SNACK ALGA (WASABI) 10G', 3, 'snack_wasabi.jpg'),
(180, '1658', 'SNACK ALGA MARINHA(NATURAL)10G+', 3, 'snack_natural.jpg'),
(181, '3202', 'SNACK ALGA MARINHA(ORIGINAL)10G+', 3, 'snack_original.jpg'),
(182, '124', 'SOBA BAURU MEZZANI 500 GR', 0, 'soba_mezzani.jpg'),
(183, '2940', 'SOJU CHUM CHURUM 360,0 ML TAMPA VERDE  17,5%', 16, 'soju_tampa_verde.jpg'),
(184, '4996', 'SOJU CHUM CHURUM BLUEBERRY 360ML', 5, 'soju_blueberry.jpg'),
(185, '1406/2302', 'SOJU CHUM CHURUM UVA 360ML', 3, 'soju_uva.jpg'),
(186, 'SOJU0001T', 'SOJU JINRO CHAMISUL CLASSIC 360ML TAMPA VERMELHO 20,1% HANARO', 5, 'soju_tampa_vermelha.jpg'),
(187, '927/2413', 'SUSHI KATA (NIGUIRIZUSHI)', 10, 'niguirizushi_kata.png'),
(188, '2583', 'TEMPERO PARA SUSHI AZUMA 750ML', 12, 'vinagra_azuma.jpg'),
(189, '118/LAM0085T', 'TEMPURA UDON CUP 62G', 36, 'tempura_udon_cup.jpeg'),
(190, '2380', 'TSUKE TSUKE', 0, 'tsuke_tsuke.jpg'),
(191, '2483', 'UDON ASSAI 500GR ', 0, 'udon_assai.jpg'),
(192, '8173', 'UMEBOSHI CASA FORTE', 0, 'umeboshi_200g.jpg'),
(193, '3615/2593', 'VINAGRE DE ARROZ KENKO 750ML', 0, 'vinagre_kenko.jpg'),
(194, '9004', 'VINAGRE DE CALDO DE CANA-DE-ACUCAR ORGÃ‚NICO 500ML', 1, 'vinagre_cana_organico.jpg'),
(195, '9002', 'VINAGRE DE MAÃ‡A ORGÃ‚NICO 500ML SÃƒO FRANSCISCO', 1, 'vinagra_maca_organico.png'),
(196, '3493', 'WAKAME SEIWA 30G', 0, 'wakame_seiwa_30.jpg'),
(197, '17893/24403/100700', 'WARIBASHI BAMBU 01 PAR', 97, 'waribashi_1.jpg'),
(198, '17893/24403/100700', 'WARIBASHI BAMBU 01 PAR C/03', 0, 'waribashi_1.jpg'),
(199, '17893/24403/100700', 'WARIBASHI BAMBU 01 PAR C/06', 1, 'waribashi_1.jpg'),
(200, '20973', 'WASABI EM PASTA GLOBO', 12, 'wasabi_globo.jpg'),
(203, '14633', 'KARE GOLDEN CURRY FORTE 220 GR', 0, 'golden_forte.jpg'),
(204, '3477', 'KARE GOLDEN CURRY FRACO 92 GR', 0, 'golden_fraco_92.jpg'),
(205, '5403', 'KARE GOLDEN CURRY MEDIO 92 GR', 1, 'golden_medio_92.jpg'),
(206, '3103', 'KARE GOLDEN CURRY FORTE 92 GR', 0, 'golden_forte_92.jpg'),
(208, '631', 'MOEDOR DE GERGELIM', 0, 'moedor_gergelim.jpg'),
(210, '3206', 'TRENTO MASSIMO BRANCO COOKIE 30G', 0, 'trento_white_cookie.png'),
(211, '3149', 'TRENTO MASSIMO CHOC 30G', 0, 'trento_chocolate.png'),
(212, '3207', 'TRENTO MASSIMO PAÃ‡OCA 30G', 0, 'trento_pacoca.png'),
(213, '2882', 'BALA JELLY SWEET MORANGO 200G', 0, 'sweet_morango_200.jpg'),
(214, '1038', 'BALA JELLY SWEET 500G', 0, 'sweet_500.jpg'),
(215, '1560', 'CHOCOPIE', 4, 'chocopie_1.jpg'),
(216, 'COD ATHOS 2415', 'POCKY GLICO BLUEBERRY', 11, 'pocky_blueberry.jpeg'),
(218, 'COD ATHOS 3825', 'BISC POCKY THIN', 12, 'pocky_thin.jpg'),
(219, '1710', 'CHINELO JUNCO CJ-17 39/40', 2, 'chinelo_junco_40.jpg'),
(220, '2494', 'MAC INST NEOGURI MILD 100', 3, 'lamen_neoguri_mild.jpg'),
(221, '127', 'OWAN S/T C/DES PRETO', 13, 'owan_preto.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

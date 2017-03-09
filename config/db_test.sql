SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `adrestabel` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `adresNaam` varchar(25) NOT NULL,
  `adresStraat` varchar(25) NOT NULL,
  `adresPostcode` varchar(25) NOT NULL,
  `adresStad` varchar(25) NOT NULL,
  `adresLand` varchar(25) NOT NULL,
  `adresTelefoon` varchar(25) NOT NULL,
  `adresBtw` varchar(25) NOT NULL,
  `adresEORI` varchar(25) NOT NULL,
  `adresRekening` int(25) NOT NULL,
  `adresContact` varchar(25) NOT NULL,
  `adresEmail` varchar(25) NOT NULL,
  `adresType` varchar(25) NOT NULL,
  `adresPost` varchar(25) NOT NULL,
  `adresIban` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

INSERT INTO `adrestabel` (`ID`, `adresNaam`, `adresStraat`, `adresPostcode`, `adresStad`, `adresLand`, `adresTelefoon`, `adresBtw`, `adresEORI`, `adresRekening`, `adresContact`, `adresEmail`, `adresType`, `adresPost`, `adresIban`) VALUES
(1, 'Test', 'Test 1', '2332TT', 'Teststad', 'Testland', '06111111', '13713337', '13371337', 2147483647, 'Raymond', 'test@test.com', 'klant', 'Same', 'nl13RABO1331313'),
(2, 'Warehouse Test', 'testweg12', '1198ET', 'Stadland', 'Landstad', '0611', '64564564', '1321321321', 56456498, 'Warehouse Testmeneer', 'test@warehouse.com', 'warehouse', 'same', '65464648'),
(3, 'Rederijtest', 'rederijstraat 13', '650', 'Rotterdam', 'Nederland', '06111112', '1655465460546', '0546546546', 16546464, 'Reder Rij', 'rederij@reder.nl', 'rederij', 'same', '056465165');

CREATE TABLE IF NOT EXISTS `cargotabel` (
  `fileNr` int(11) NOT NULL,
  `cargoAantal` int(11) NOT NULL,
  `cargoType` varchar(25) NOT NULL,
  `cargoCbm` varchar(25) NOT NULL,
  `cargoKg` varchar(25) NOT NULL,
  `cargoOmschrijving` varchar(100) NOT NULL,
  `UID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cargotabel` (`fileNr`, `cargoAantal`, `cargoType`, `cargoCbm`, `cargoKg`, `cargoOmschrijving`, `UID`) VALUES
(1, 1, 'pallet', '2', '15', 'boeken', 0),
(2, 1, 'pallet', '2', '15', 'boeken', 0),
(2, 2, 'pallets', '2', '1555', 'nog meer boeken', 0);

CREATE TABLE IF NOT EXISTS `globalfiletabel` (
  `fileNr` int(11) NOT NULL AUTO_INCREMENT,
  `expImp` varchar(25) NOT NULL,
  `klant` varchar(25) NOT NULL,
  `rederij` varchar(25) NOT NULL,
  `pol` varchar(25) NOT NULL,
  `pod` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `finalDest` varchar(25) NOT NULL,
  `vessel` varchar(25) NOT NULL,
  `voyage` varchar(25) NOT NULL,
  `ets` varchar(25) NOT NULL,
  `eta` varchar(25) NOT NULL,
  `etaDest` varchar(25) NOT NULL,
  `levertaanophalen` varchar(25) NOT NULL,
  `warehouse` varchar(25) NOT NULL,
  `closing` varchar(25) NOT NULL,
  `losRefWhs` varchar(25) NOT NULL,
  `laadAdres` varchar(25) NOT NULL,
  `laadDatum` varchar(25) NOT NULL,
  `laadTijd` varchar(25) NOT NULL,
  `shipperRef` varchar(25) NOT NULL,
  `poNr` varchar(25) NOT NULL,
  `commentFile` varchar(100) NOT NULL,
  `carrierBooking` varchar(25) NOT NULL,
  `UID` int(11) NOT NULL,
  PRIMARY KEY (`fileNr`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

INSERT INTO `globalfiletabel` (`fileNr`, `expImp`, `klant`, `rederij`, `pol`, `pod`, `country`, `finalDest`, `vessel`, `voyage`, `ets`, `eta`, `etaDest`, `levertaanophalen`, `warehouse`, `closing`, `losRefWhs`, `laadAdres`, `laadDatum`, `laadTijd`, `shipperRef`, `poNr`, `commentFile`, `carrierBooking`, `UID`) VALUES
(1, 'export', 'Test', 'Rederijtest', 'rotterdam', 'amsterdam', '', 'zuid spanje', 'MS. Huppeta', '', '2017-03-31', '2017-04-01', '2017-04-06', 'levertaan', 'Warehouse Test', '2017-01-01', 'Losreftest12', 'Laadadres 12', '2017-01-01', '13:00', 'shipper ref test', 'po nr test', '', '', 0),
(2, 'export', 'Test', 'Rederijtest', 'rotterdam', 'amsterdam', '', 'zaanstad', 'MS. Huppeta', '', '2017-03-31', '2017-04-01', '2017-04-06', 'levertaan', 'Warehouse Test', '2017-01-01', 'Losreftest12', 'Laadadres 12', '2017-01-01', '13:00', 'shipper ref test', 'po nr test', '', '', 0);

CREATE TABLE IF NOT EXISTS `hbltabel` (
  `UID` varchar(25) NOT NULL,
  `shipperNaam` varchar(25) NOT NULL,
  `shipperStraat` varchar(25) NOT NULL,
  `shipperPostcodeStad` varchar(25) NOT NULL,
  `shipperLand` varchar(25) NOT NULL,
  `shipperExtra` varchar(25) NOT NULL,
  `consigneeNaam` varchar(25) NOT NULL,
  `consigneeStraat` varchar(25) NOT NULL,
  `consigneePostcodeStad` varchar(25) NOT NULL,
  `consigneeLand` varchar(25) NOT NULL,
  `consigneeContact` varchar(25) NOT NULL,
  `agentNaam` varchar(25) NOT NULL,
  `agentStraat` varchar(25) NOT NULL,
  `agentPostcodeStad` varchar(25) NOT NULL,
  `agentLand` varchar(25) NOT NULL,
  `agentContact` varchar(25) NOT NULL,
  `chargesAccount` varchar(25) NOT NULL,
  `aantalOrigineel` varchar(25) NOT NULL,
  `clausule1` varchar(25) NOT NULL,
  `clausule2` varchar(25) NOT NULL,
  `clausule3` varchar(25) NOT NULL,
  `clausule4` varchar(25) NOT NULL,
  `notifyNaam` varchar(25) NOT NULL,
  `notifyStraat` varchar(25) NOT NULL,
  `notifyPostcodeStad` varchar(25) NOT NULL,
  `notifyLand` varchar(25) NOT NULL,
  `notifyContact` varchar(25) NOT NULL,
  `fileNr` varchar(25) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `hbltabel` (`UID`, `shipperNaam`, `shipperStraat`, `shipperPostcodeStad`, `shipperLand`, `shipperExtra`, `consigneeNaam`, `consigneeStraat`, `consigneePostcodeStad`, `consigneeLand`, `consigneeContact`, `agentNaam`, `agentStraat`, `agentPostcodeStad`, `agentLand`, `agentContact`, `chargesAccount`, `aantalOrigineel`, `clausule1`, `clausule2`, `clausule3`, `clausule4`, `notifyNaam`, `notifyStraat`, `notifyPostcodeStad`, `notifyLand`, `notifyContact`, `fileNr`) VALUES
('', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '2');

CREATE TABLE IF NOT EXISTS `rl_gebruikerstabel` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `gebruiker` varchar(25) NOT NULL,
  `wachtwoord` varchar(100) NOT NULL,
  `email` varchar(25) NOT NULL,
  `gebruikersLevel` varchar(25) NOT NULL,
  `registerdate` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `rl_gebruikerstabel` (`ID`, `gebruiker`, `wachtwoord`, `email`, `gebruikersLevel`, `registerdate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.nl', '1', '2017-02-02 19:58:13');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

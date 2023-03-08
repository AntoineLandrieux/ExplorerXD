SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `explorerxd`
--

-- --------------------------------------------------------

--
-- Structure de la table `unconfirmed`
--

DROP TABLE IF EXISTS `unconfirmed`;
CREATE TABLE IF NOT EXISTS `unconfirmed` (
  `web_id` int(11) NOT NULL AUTO_INCREMENT,
  `web_name` varchar(256) NOT NULL,
  `web_ip` varchar(256) NOT NULL,
  `web_desc` text NOT NULL,
  `web_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `web_userID` int(11) NOT NULL,
  PRIMARY KEY (`web_id`),
  UNIQUE KEY `web_name` (`web_name`),
  UNIQUE KEY `web_ip` (`web_ip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(256) NOT NULL,
  `user_desc` text NOT NULL,
  `user_paswd` varchar(256) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `web`
--

DROP TABLE IF EXISTS `web`;
CREATE TABLE IF NOT EXISTS `web` (
  `web_id` int(11) NOT NULL AUTO_INCREMENT,
  `web_name` varchar(256) NOT NULL,
  `web_ip` varchar(256) NOT NULL,
  `web_desc` text NOT NULL,
  `web_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `web_userID` int(11) NOT NULL,
  PRIMARY KEY (`web_id`),
  UNIQUE KEY `web_name` (`web_name`),
  UNIQUE KEY `web_ip` (`web_ip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

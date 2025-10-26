-- Create the database
CREATE DATABASE IF NOT EXISTS `ims`;

-- Use the database
USE `ims`;

-- Create the contracts table
CREATE TABLE IF NOT EXISTS `contracts` (
  `KONTRAK_NO` varchar(10) NOT NULL,
  `CLIENT_NAME` varchar(50) NOT NULL,
  `OTR` decimal(15,2) NOT NULL,
  PRIMARY KEY (`KONTRAK_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample data into the contracts table
INSERT INTO `contracts` (`KONTRAK_NO`, `CLIENT_NAME`, `OTR`) VALUES
('AGR00001', 'SUGUS', 240000000.00);

-- Create the installment_schedules table
CREATE TABLE IF NOT EXISTS `installment_schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `KONTRAK_NO` varchar(10) NOT NULL,
  `ANGSURAN_KE` int(11) NOT NULL,
  `ANGSURAN_PER_BULAN` decimal(15,2) NOT NULL,
  `TANGGAL_JATUH_TEMPO` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `KONTRAK_NO` (`KONTRAK_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample data into the installment_schedules table
INSERT INTO `installment_schedules` (`KONTRAK_NO`, `ANGSURAN_KE`, `ANGSURAN_PER_BULAN`, `TANGGAL_JATUH_TEMPO`) VALUES
('AGR00001', 1, 12907000.00, '2024-01-25'),
('AGR00001', 2, 12907000.00, '2024-02-25'),
('AGR00001', 3, 12907000.00, '2024-03-25'),
('AGR00001', 4, 12907000.00, '2024-04-25'),
('AGR00001', 5, 12907000.00, '2024-05-25'),
('AGR00001', 6, 12907000.00, '2024-06-25'),
('AGR00001', 7, 12907000.00, '2024-07-25'),
('AGR00001', 8, 12907000.00, '2024-08-25'),
('AGR00001', 9, 12907000.00, '2024-09-25'),
('AGR00001', 10, 12907000.00, '2024-10-25'),
('AGR00001', 11, 12907000.00, '2024-11-25'),
('AGR00001', 12, 12907000.00, '2024-12-25');

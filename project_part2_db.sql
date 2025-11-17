-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2025 at 04:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_part2_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_list`
--

CREATE TABLE `admin_list` (
  `username` varchar(50) NOT NULL,
  `admin_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_list`
--

INSERT INTO `admin_list` (`username`, `admin_pass`) VALUES
('admin1', 'password123'),
('admin2', 'password234'),
('admin3', 'password345');

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `job_reference_number` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `street_address` varchar(100) NOT NULL,
  `suburb_town` varchar(50) NOT NULL,
  `state` varchar(20) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `skill1` varchar(50) DEFAULT NULL,
  `skill2` varchar(50) DEFAULT NULL,
  `skill3` varchar(50) DEFAULT NULL,
  `skill4` varchar(50) DEFAULT NULL,
  `skill5` varchar(50) DEFAULT NULL,
  `other_skills` text DEFAULT NULL,
  `status` enum('New','Current','Final') DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `job_reference_number`, `first_name`, `last_name`, `street_address`, `suburb_town`, `state`, `postcode`, `email`, `phone`, `skill1`, `skill2`, `skill3`, `skill4`, `skill5`, `other_skills`, `status`) VALUES
(3, 'A0001', 'QuangMinh', 'Pham', 'wgdry', 'weshfty', 'NT', '1234', 'minhpq2010@gmail.com', '0912345678', 'HTML', 'CSS', '', '', '', 'Procrastinate', 'New'),
(4, 'A0002', 'Ben', 'Dover', 'ewmnefrwm', 'tjuykihgtfrdsadf', 'QLD', '1235', 'example@email.com', '1234567890', '', '', '', 'PHP', 'C#', 'Dummy testing', 'New'),
(5, 'A0002', 'Ben', 'Dover', 'ewmnefrwm', 'tjuykihgtfrdsadf', 'QLD', '1235', 'example@email.com', '1234567890', '', '', '', 'PHP', 'C#', 'Dummy testing', 'Current'),
(6, 'A0001', 'John', 'Doe', 'Street Address Thing', 'Towny', 'NT', '3463', 'example1@email.com', '1243567967', '', '', 'JavaScript', 'PHP', 'C#', 'BLA BLA', 'New'),
(7, 'A0001', 'John', 'Wick', '100 Street Name', 'Somewhere far far away', 'VIC', '4567', 'example24@email.com', '1243658709', '', '', '', '', '', 'Guns and taking care of dogs', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `position` varchar(40) NOT NULL,
  `reference_num` varchar(20) DEFAULT NULL,
  `Salary_range` varchar(50) DEFAULT NULL,
  `Brief_Description` text DEFAULT NULL,
  `Responsibilities` text DEFAULT NULL,
  `Qualifications` text DEFAULT NULL,
  `Preferable` text DEFAULT NULL,
  `Tasks` text DEFAULT NULL,
  `Report_Target` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`position`, `reference_num`, `Salary_range`, `Brief_Description`, `Responsibilities`, `Qualifications`, `Preferable`, `Tasks`, `Report_Target`) VALUES
('Cloud Engineer', 'A0001', '$80,000 – $120,000/year', 'Design, build, and operate scalable cloud infrastructure and automation pipelines to support production services and developer platforms', 'Design and implement cloud architectures (IaaS/PaaS); Develop infrastructure-as-code using Terraform/CloudFormation; Maintain CI/CD pipelines for deployment and testing; Monitor system performance and handle incidents; Collaborate with development teams to ensure reliability and security', 'Bachelors degree in Computer Science, Engineering, or related field; 3+ years managing cloud infrastructure (AWS, Azure, or GCP); Proficiency in Terraform or CloudFormation; Experience with scripting (Python, Bash) and Git; Knowledge of Docker/Kubernetes', 'Experience with cost optimization and advanced networking; Familiarity with policy-as-code tools (OPA, Sentinel); Certifications: AWS Solutions Architect, Azure Administrator, or GCP Professional', 'Create and maintain Terraform modules for new services; Build blue/green deployment pipelines using GitOps; Respond to alerts and conduct post-incident analysis; Optimize cloud resource usage and spending', 'Lead Infrastructure Engineer'),
('Cybersecurity Engineer', 'A0002', '$75,000 – $115,000/year', 'Protect systems and data by designing detection, prevention, and response capabilities; perform vulnerability assessments and implement security controls across environments', 'Develop and tune IDS/IPS, EDR, and SIEM rules for early threat detection; Conduct vulnerability scans and coordinate penetration testing; Implement and maintain security controls for IAM and cloud security; Lead incident response and create documentation', 'Bachelors degree in Cybersecurity, Computer Science, or related field; 2+ years of experience in security operations or vulnerability management; Experience with SIEM tools (Splunk, Elastic) and endpoint protection; Strong understanding of operating systems, networking, and scripting (Python/PowerShell)', 'Experience integrating security into CI/CD pipelines; Knowledge of compliance standards like ISO27001 or SOC2; Certifications: CISSP, OSCP, CEH, or cloud security credentials (CCSP, AWS Security)', 'Investigate and triage security alerts and document findings; Run regular vulnerability scans and oversee remediation; Create detection rules and automated incident response scripts', 'Security Operations Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_list`
--
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `admin_pass` (`admin_pass`);

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`position`),
  ADD UNIQUE KEY `reference_num` (`reference_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

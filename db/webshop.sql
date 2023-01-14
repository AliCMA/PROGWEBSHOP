<!--  Ali zijn code -->

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('user','admin','manager','moderator','updater') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `users` (`id`, `role`, `username`, `password`, `name`) 
VALUES 
(NULL, 'admin', 'gertjan1', '81dc9bdb52d04dc20036dbd8313ed055', 'gertjan'), 
(NULL, 'manager', 'ek1', '81dc9bdb52d04dc20036dbd8313ed055', 'erkan'), 
(NULL, 'moderator', 'behic01', '81dc9bdb52d04dc20036dbd8313ed055', 'behic'), 
(NULL, 'updater', 'said97', '81dc9bdb52d04dc20036dbd8313ed055', 'said'); 




ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

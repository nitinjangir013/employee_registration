CREATE TABLE `emp_list` (
  `id` int(11) NOT NULL,
  `image_add` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL
);

ALTER TABLE `emp_list`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `emp_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
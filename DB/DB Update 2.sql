ALTER TABLE `course` CHANGE `image_path` `image_path` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `instructor` CHANGE `image_path` `image_path` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `student` CHANGE `image_path` `image_path` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `student` CHANGE `gender` `gender` VARCHAR(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `course` ADD UNIQUE( `name`);
ALTER TABLE `track` ADD UNIQUE( `name`);
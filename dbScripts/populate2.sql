USE stablestudy;

INSERT INTO users(username, email, fName, lName, password, school) VALUES
	('danhn', 'danhn@smu.edu', 'Danh', 'Nguyen', 'Password1', 'SMU'),
	('afulsom', 'afulsom@smu.edu', 'Drew', 'Fulsom', 'password', 'SMU'),
	('nroberts', 'robertsn@smu.edu', 'Nick', 'Roberts', 'Tester1', 'SMU');

INSERT INTO locations(latitude, longitude, floor, buildingName, roomNumber, classroom, outdoor, open_space, study_room,chairs, computers, whiteboards, printers, projectors, restricted) VALUES
	(32.845576, -96.786349, 1, 'Florence', '106', 1, 0, 0, 0, 50, 0, 1, 0, 1, FALSE),
	(32.845576, -96.786360, 1, 'Florence', '107', 1, 0, 0, 0, 50, 0, 1, 0, 1, FALSE),
	(32.845569, -96.786333, 3, 'Florence', '308', 1, 0, 0, 0, 10, 0, 1, 0, 1, FALSE),
	(32.845576, -96.786349, 3, 'Florence', '307', 1, 0, 0, 0, 25, 0, 1, 0, 1, FALSE),
	(32.845553, -96.785869, 3, 'Florence', '305', 1, 0, 0, 0, 25, 0, 1, 0, 1, FALSE),
	(32.845576, -96.786349, 3, 'Florence', '306', 1, 0, 0, 0, 25, 0, 1, 0, 1, FALSE),
	(32.845996, -96.785861, 3, 'Florence', '304', 1, 0, 0, 0, 50, 0, 1, 0, 1, FALSE),
	(32.845591, -96.785826, 3, 'Florence', '302', 1, 0, 0, 0, 25, 0, 1, 0, 1, FALSE),
	(32.845589, -96.785799, 2, 'Florence', '201', 1, 0, 0, 0, 50, 0, 1, 0, 1, FALSE),
	(32.845576, -96.786360, 2, 'Florence', '207', 1, 0, 0, 0, 50, 0, 1, 0, 1, FALSE),
	(32.845549, -96.785799, 1, 'Florence', '100', 1, 0, 0, 0, 25, 0, 1, 0, 1, FALSE),
	(32.845589, -96.785799, 1, 'Florence', '101', 1, 0, 0, 0, 25, 0, 1, 0, 1, FALSE),
	(32.842306, -96.782006, 1, 'Junkins', '101', 1, 0, 0, 0, 50, 1, 1, 0, 1, FALSE),
	(32.842294, -96.782007, 1, 'Junkins', '102', 1, 0, 0, 0, 25, 1, 1, 1, 1, FALSE),
	(32.842367, -96.781926, 1, 'Junkins', '110', 1, 0, 0, 0, 25, 1, 1, 0, 1, FALSE),
	(32.842437, -96.781800, 1, 'Junkins', '112', 1, 0, 0, 0, 25, 1, 1, 0, 1, FALSE),
	(32.842437, -96.781800, 1, 'Junkins', '113', 1, 0, 0, 0, 50, 1, 1, 0, 1, FALSE),
	(32.842264, -96.781887, 2, 'Junkins', '210', 0, 0, 0, 1, 25, 1, 1, 0, 1, TRUE),
	(32.842370, -96.781907, 2, 'Junkins', NULL, 0, 0, 1, 0, 10, 0, 0, 0, 0, FALSE),
	(32.842240, -96.781969, 2, 'Junkins', '203', 1, 0, 0, 0, 25, 1, 1, 0, 1, FALSE),
	(32.842283, -96.781904, 2, 'Junkins', '205', 1, 0, 0, 0, 25, 1, 1, 0, 1, FALSE),
	(32.842400, -96.781760, 3, 'Junkins', '338', 0, 0, 0, 1, 25, 1, 1, 0, 1, FALSE),
	(32.842346, -96.781825, 3, 'Junkins', '342', 0, 0, 0, 1, 25, 1, 1, 1, 1, FALSE),
	(32.842328, -96.781833, 3, 'Junkins', '344', 0, 0, 0, 1, 25, 1, 1, 1, 1, FALSE),
	(32.842928, -96.782063, 1, 'Embrey', '129', 0, 0, 0, 1, 25, 0, 1, 0, 1, FALSE),
	(32.842890, -96.782091, 1, 'Embrey', '124', 0, 0, 0, 1, 25, 1, 0, 1, 0, FALSE),
	(32.842573, -96.783177, 1, 'Caruth', '116', 0, 0, 0, 1, 10, 1, 0, 0, 0, FALSE),
	(32.842598, -96.783188, 1, 'Caruth', '106', 0, 0, 0, 1, 50, 1, 1, 1, 1, FALSE),
	(32.842690, -96.783063, 1, 'Caruth', NULL, 0, 0, 1, 0, 10, 0, 1, 0, 0, FALSE),
	(32.842673, -96.783088, 1, 'Caruth', '147', 1, 0, 0, 0, 50, 1, 1, 0, 1, FALSE),
	(32.842754, -96.782792, 1, 'Caruth', '161', 1, 0, 0, 0, 25, 1, 1, 0, 1, FALSE),
	(32.842754, -96.782792, 1, 'Caruth', '179', 1, 0, 0, 0, 25, 1, 1, 0, 1, FALSE),
	(32.842754, -96.782792, 1, 'Caruth', '183', 1, 0, 0, 0, 25, 1, 1, 0, 1, FALSE),
	(32.842754, -96.782792, 1, 'Caruth', '184', 1, 0, 0, 0, 25, 1, 1, 0, 1, FALSE),
	(32.842760, -96.782839, 1, 'Caruth', NULL, 0, 0, 1, 0, 10, 0, 0, 0, 0, FALSE),
	(32.842782, -96.782749, 2, 'Caruth', '266', 0, 0, 0, 1, 10, 0, 0, 0, 0, TRUE),
	(32.842783, -96.782953, 2, 'Caruth', NULL, 0, 0, 1, 0, 10, 0, 0, 0, 0, FALSE),
	(32.842545, -96.783108, 3, 'Caruth', '314', 1, 0, 0, 0, 25, 1, 1, 0, 1, FALSE),
	(32.842812, -96.783021, 3, 'Caruth', '347', 0, 0, 0, 1, 10, 0, 0, 0, 0, FALSE),
	(32.842794, -96.782729, 3, 'Caruth', '379', 1, 0, 0, 0, 25, 1, 1, 0, 1, FALSE),
	(32.842794, -96.782729, 3, 'Caruth', '383', 1, 0, 0, 0, 25, 1, 1, 0, 1, FALSE),
	(32.842147, -96.783167, NULL, 'Outside', NULL, 0, 1, 0, 0, NULL, 0, 0, 0, 0, FALSE),
	(32.840694, -96.784390, NULL, 'Outside', NULL, 0, 1, 0, 0, NULL, 0, 0, 0, 0, FALSE),
	(32.839658, -96.784334, NULL, 'Outside', NULL, 0, 1, 0, 0, NULL, 0, 0, 0, 0, FALSE);

INSERT INTO pictures(picture_id, room_id, pictureurl) VALUES
	(1, 1, '/img/Florence/106'),
	(2, 2, '/img/Florence/106'),
	(3, 3, '/img/Florence/106'),
	(4, 4, '/img/Florence/106'),
	(5, 5, '/img/Florence/106'),
	(6, 6, '/img/Florence/106'),
	(7, 7, '/img/Florence/106'),
	(8, 8, '/img/Florence/106'),
	(9, 9, '/img/Florence/106'),
	(10, 10, '/img/Florence/106'),
	(11, 11, '/img/Florence/106'),
	(12, 12, '/img/Florence/106'),
	(13, 12, '/img/Florence/106');

INSERT INTO favorites(username, favRoom) VALUES
	('danhn', 1),
	('danhn', 2),
	('danhn', 3),
	('danhn', 4),
	('afulsom', 1),
	('afulsom', 12);
INSERT INTO "MasterRole" ("MasterRoleId", "MasterRoleName", "MasterRoleCode", "MasterRoleCreatedAt", "MasterRoleUpdatedAt", "MasterRoleDeletedAt", "MasterRoleCreatedBy", "MasterRoleUpdatedBy", "MasterRoleDeletedBy") 
VALUES 
(1, 'SA', 'Super Admin', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL, 1, 1, NULL),
(2, 'AD', 'Admin', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL, 1, 1, NULL),
(3, 'US', 'User', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL, 1, 1, NULL),
(4, 'NULL', 'Not have roles', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL, 1, 1, NULL);

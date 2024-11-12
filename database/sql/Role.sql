INSERT INTO "MasterRole" ("MasterRoleName", "MasterRoleCode", "MasterRoleCreatedAt", "MasterRoleUpdatedAt", "MasterRoleDeletedAt", "MasterRoleCreatedBy", "MasterRoleUpdatedBy", "MasterRoleDeletedBy") 
VALUES 
('SA', 'Super Admin', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL, 1, 1, NULL),
('AD', 'Admin', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL, 1, 1, NULL),
('US', 'User', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL, 1, 1, NULL),
('NULL', 'Not have roles', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL, 1, 1, NULL);

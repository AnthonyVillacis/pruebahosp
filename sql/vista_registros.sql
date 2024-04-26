CREATE VIEW listado_horarios AS
SELECT u.username AS usuario, a.tipo_entrada, a.timestamp
FROM asistencias a
INNER JOIN usuarios u ON a.usuario_id = u.id;

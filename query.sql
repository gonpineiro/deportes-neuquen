SELECT sol.id as id,
	wap_usr.nombre as nombre_te,
	usu.direccion_cp as cp,
	usu.direccion_calle as calle,
	usu.direccion_nro as nro_calle,
	wap_adm.nombre as nombre_admin,
	bar.nombre as barrio,
	usu_te.otro_barrio,
	ciu.nombre as ciudad,
	CASE
		WHEN bar.id IS NOT NULL THEN (
			select nombre
			from deportes_ciudades dep_ciu
			where dep_ciu.id = bar.id_ciudad
		)
		ELSE ciu.nombre
	END as ciudad_barrio,
	est.nombre as estado,
	sol.fecha_alta
FROM deportes_solicitudes sol -- Obtenemos el usuario de wappersona
	LEFT OUTER JOIN (
		dbo.wappersonas as wap_usr
		LEFT JOIN deportes_usuarios usu_te ON wap_usr.ReferenciaID = usu_te.id_wappersonas
	) ON sol.id_usuario = usu_te.id -- Obtenemos el admin de wappersona
	LEFT OUTER JOIN (
		dbo.wappersonas as wap_adm
		LEFT JOIN deportes_usuarios usu_adm ON wap_adm.ReferenciaID = usu_adm.id_wappersonas
	) ON sol.id_usuario_admin = usu_adm.id -- Obtenemos el barrio
	LEFT OUTER JOIN (
		dbo.deportes_barrios as bar
		LEFT JOIN deportes_usuarios usu_bar ON bar.id = usu_bar.id_barrio
	) ON sol.id_usuario = usu_bar.id -- Obtenemos la ciudad    
	LEFT OUTER JOIN (
		dbo.deportes_ciudades as ciu
		LEFT JOIN deportes_usuarios usu_ciu ON ciu.id = usu_ciu.id_ciudad
	) ON sol.id_usuario = usu_ciu.id
	LEFT JOIN deportes_estados est ON est.id = sol.id_estado
	LEFT JOIN deportes_usuarios usu ON usu.id = sol.id_usuario
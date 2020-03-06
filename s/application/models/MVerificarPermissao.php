<?php  	
	class MVerificarPermissao extends CI_Model{

		public function validar_permissao( $cd_usuario, $modulo, $permissao ) {
			$query = $this->db->select("tb_usuario_permissao.ic_usu_perm")
					->from("tb_usuario_permissao")
					->join("tb_usuario", "tb_usuario.cd_usuario = tb_usuario_permissao.cd_usuario","inner")
					->join("tb_permissoes", "tb_permissoes.cd_permissao = tb_usuario_permissao.cd_permissao","inner")
					->join("tb_modulo", "tb_modulo.cd_modulo = tb_usuario_permissao.cd_modulo","inner")
					->where("tb_usuario_permissao.cd_usuario", $cd_usuario )
					->where("tb_modulo.nm_modulo", $modulo )
					->where("tb_permissoes.nm_permissao", $permissao )
					->where("tb_usuario.ic_usuario", 1 )
					->where("tb_usuario.ic_suspenso", 0 )
					->where("tb_modulo.ic_modulo", 1 )
					->where("tb_permissoes.ic_permissao", 1 )
					->group_by('tb_usuario.cd_usuario');
			return $query->get()->row_array();
		}

	}
?>
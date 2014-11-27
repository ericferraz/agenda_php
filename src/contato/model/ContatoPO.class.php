<?php
/**
 *
 *Classe que representa o po do sistema
 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
 *@version 1.0
 *@since  16/03/2014
 */
final class ContatoPO extends AbstractPO{

	private $codigo;
	private $nome;
	private $sobreNome;
	private $dataNascimento;
	private $email;
	private $observacao;

	/**
	 *
	 *Método construtor
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 17/03/2014
	 *@param
	 * @return the bare_field_name
	 */
	/**
	public function __construct($id){
		parent::__construct($id);
	}

	/**
	 *
	 *Método construtor sobrecarregado
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 17/03/2014
	 *@param
	 * @return the bare_field_name
	 */
	public function __construct($id=null, $codigo=null, $nome=null,$sobreNome=null,$dataNascimento=null,$email=null,$observacao=null) {

		parent::__construct($id);
		$this->setId($id);
		$this->setCodigo($codigo);
		$this->setNome($nome);
		$this->setSobreNome($sobreNome);
		$this->setDataNascimento($dataNascimento);
		$this->setEmail($email);
		$this->setObservacao($observacao);
	}

	public function getCodigo() {
		return $this->codigo;
	}

	public function  setCodigo($codigo) {
		$this->codigo = $codigo;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public  function getSobreNome() {
		return $this->sobreNome;
	}

	public function setSobreNome($sobreNome) {
		$this->sobreNome = $sobreNome;
	}

	public function getDataNascimento() {
		return $this->dataNascimento;
	}

	public function setDataNascimento($dataNascimento) {
		$this->dataNascimento = $dataNascimento;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function  getObservacao() {
		return $this->observacao;
	}

	public function setObservacao( $observacao) {
		$this->observacao = $observacao;
	}
}
?>
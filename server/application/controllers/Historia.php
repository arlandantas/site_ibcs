<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Historia extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Programacoes_model', 'programacao');
	}

	public function index() {
		$passos = [[
				'titulo' => 'O começo de tudo',
				'data' => '',
				'conteudo' => '<p>A nossa história iniciou há mais de 40  anos atrás na Primeira Igreja Batista Vila Maria, onde ali congregava a Irmã Maria José de Alcântara Santos, que lutava e orava pela conversão de seu marido, o irmão Manuel Luís dos Santos, um homem de costumes rígidos, de personalidade forte e que não gostava de crentes. Passava a maior parte de suas horas de folga, a beira de campos de futebol, assistindo aos jogos.</p><p>Foi em um destes dias de jogos à beira de um campo, que Deus encheu o coração do irmão Manuel de seu infinito amor. Foi quando ele decidiu ir para a igreja com sua família. Após participar dos trabalhos da igreja, com a ajuda de alguns irmãos, o irmão Manuel conseguiu adquirir sua casa própria na cidade de Guarulhos, mais precisamente no bairro do Haroldo Veloso, no ano de 1970.</p>'
			],
			[
				'titulo' => 'Ponto de Pregação',
				'data' => '',
				'conteudo' => '<p>A ida para sua igreja em Vila Maria era bem difícil por conta da distância e da precariedade de transportes na região. Foi então que sentiu em seu coração o desejo de iniciar em sua nova residência um ponto de pregação. E pediu mais uma vez, a ajuda dos irmãos da Primeira Igreja Batista de Vila Maria, e na época seu pastor Mário Fernando Dória, que prontamente atenderam e apoiaram, mandando irmãos para ajudarem no trabalho. As reuniões eram aos domingos, às 15 horas, e, logo de início o trabalho já envolvia cerca de trinta pessoas e muitas crianças do bairro. O ponto de pregação foi desenvolvendo com o tempo todas as atividades de uma igreja: cultos, estudos, escolas bíblicas dominicais, etc. O trabalho foi crescendo, e então várias pessoas do bairro começaram a frequentar a casa do irmão Manuel. Os anos foram se passando, e no começo do ano de 1981 é dado o início oficial da União Feminina Missionária da congregação no bairro do Veloso, no dia 17/03/1981. As mulheres começam um trabalho evangelístico e missionário no bairro. A congregação não parava de crescer, então houve a necessidade de se conseguir um lugar maior para se cultuar a Deus. Foi quando os irmãos resolveram alugar um salão ao lado do templo atual para continuar a obra, o que não demorou muito tempo, ficou pequeno também.</p>'
			],
			[
				'titulo' => 'Nasce a Igreja Batista',
				'data' => '',
				'conteudo' => '<p>Em 13 de maio de 1981, a PIB Vila Maria, com seu pastor na época, pastor Zacarias de Aguiar Severa, em concílio, aprovou então a formação da Igreja Batista em Cidade Seródio, dando a esta igreja a autonomia de desenvolver seus trabalhos. Neste mesmo dia foi dado posse ao seu primeiro pastor José Erivan Silveira. A PIB Vila Maria decidiu comprar um lote de aproximadamente 10x25m² que pertencia à irmã Otacília. O templo foi construído, pintado e mobiliado, e em 05 de dezembro de 1981 foi inaugurada a Igreja Batista em Cidade Seródio , com 56 membros.</p>'
			],
			[
				'titulo' => 'Pastores',
				'data' => '',
				'conteudo' => '<h2>José Erivan Silveira</h2>
					<p>O nosso primeiro pastor foi ordenado e empossado ao ministério no ano de 1981. O pastor Jose Erivan pastoreou a igreja por um período de três anos (1985). Queremos destacar a contribuição de alguns irmãos durante este período. Os irmãos Juvenil, Antonio Carlos, Dionísio , e irmãs Márcia, Benê, Dulce e tantos outros que não estão sendo mencionados aqui.</p>
					<h2>Oswaldo de Miranda</h2>
					<p>Com a saída do pr. José Erivan, tomou posse da igreja o pastor Oswaldo de Miranda que também pastoreou por um período de três anos (1988) e apesar das dificuldades, a igreja prevalecia. Quando o pr. Oswaldo saiu da igreja para pastorear em outro lugar, a igreja se prostrou de joelhos e orou, pedindo a Deus que enviasse um outro pastor. E Deus enviou o Pastor Adilson Jose Oliveira, que pastoreou a igreja por um curto período de um ano e seis meses (1990).</p>
					<p>A igreja sofre, e novamente ora, desta vez por um período de seis meses.</p>
					<h2>Pr. Ruben Nazareth dos Santos</h2>
					<p>Em 27 de abril de 1991, tomou posse da igreja o Pastor Ruben Nazareth dos Santos, o qual deu grande contribuição, desafiando a igreja a construir o atual templo, que na época, era um empreendimento de grande porte. Porém , com grande empenho do pastor, diretoria e toda a igreja, o templo foi iniciado.</p>
					<p>Dois fatos marcantes levam agora a igreja a prantear. No dia 09 de outubro de 1992, faleceu o irmão fundador da igreja, Manuel Luis dos Santos. No dia 29 de dezembro de 1995, faleceu o irmão Juvenil Pereira de Morais. Na verdade eles não morreram, mas deram um passo para a vida, conforme sabemos em João 5:24: "Aqueles que crêem no Senhor Jesus não morrem, mas passam da morte para a vida."</p>
					<h2>Pr. Ismael Luís dos Santos</h2>
					<p>Bem, conquanto o ministério do pastor Ruben tenha sido profícuo, em 13 de setembro de 1998, o Senhor o chamou para outra igreja. Novamente a IBCS fica por quase três anos sem pastor. E tendo como vice-presidente o então seminarista Ismael para ser seu pastor.</p>
					<p>E no dia 20 de abril de 2001 ele foi ordenado para o ministério pastoral e tomou posse da IBCS.</p>
					<p>Após ter assumido a igreja, o pastor Ismael continuou a construção do templo e demais projetos da igreja.</p>'
			],
			[
				'titulo' => 'Igreja Batista Filadélfia - Paracambi/RJ',
				'data' => '',
				'conteudo' => '<p>Em 2002, uma das grandes realizações no ministério do Pr. Ismael, foi de organizar a primeira filha de nossa igreja, que é a Igreja Batista Filadélfia na cidade de Paracambi no Rio de Janeiro. Que hoje tem como seu pastor Américo Teixeira Arantes.</p>'
			],
			[
				'titulo' => 'Igreja Batista Pq. Santos Dumont - Guarulhos/SP',
				'data' => '',
				'conteudo' => '<p>No dia 15 de agosto de 2006, inauguramos a Congregação no Pq. Santos Dumont, outro projeto desafiador. O trabalho iniciou com membros de nossa igreja que moravam nessa região, com cultos nos lares.</p>'
			]
		];

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($passos));
	}

	public function add() {

	}

	public function update( $id = NULL ) {

	}

	public function delete( $id = NULL ) {

	}
}

/* End of file Historia.php */


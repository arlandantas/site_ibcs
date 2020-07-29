import React from 'react';
import axios from 'axios';
import '../css/home.css';

export default class Home extends React.Component {
  constructor (props) {
    super(props);
    this.state = {
      loadingProgramacao: true,
      programacoes: [],
      noticias: []
    }
  }

  componentDidMount () {
    axios.get('/programacao')
      .then(({ data }) => {
        this.setState({ programacoes: data })
      }).catch(e => {
        console.error('programacao', e)
      })
  }

  render () {
    return (
      <div className="page" id="home">
          <section id="hero">
              <img src="imgs/logo.png" alt="Igreja Batista em Cidade Serodio"/>
          </section>
          <section id="donnations">
              <div onClick={() => { window.location.hash = '#/doacoes' }}>
                  <div id="icon">
                      <i className="fas fa-donate"></i>
                  </div>
                  <div id="text">
                      <h2>Faça sua doação</h2>
                      <span>Clique aqui para fazer sua doação, dízimo ou oferta.</span>
                  </div>
              </div>
          </section>
          <section id="buttons">
              {/* <a className="btn" href="#/noticias">
                  <span className="icon"><i className="fas fa-newspaper"></i></span>
                  <span className="txt">notícias</span>
              </a> */}
              <a className="btn" href="https://youtube.com/ibserodio" target="_blank" rel="noopener noreferrer">
                  <span className="icon"><i className="fab fa-youtube"></i></span>
                  <span className="txt">YouTube</span>
              </a>
              <a className="btn" href="https://bibliaonline.com.br" target="_blank" rel="noopener noreferrer">
                  <span className="icon"><i className="fas fa-bible"></i></span>
                  <span className="txt">bíblia</span>
              </a>
              <a className="btn" href="https://www.instagram.com/ibserodio/" target="_blank" rel="noopener noreferrer">
                  <span className="icon"><i className="fab fa-instagram"></i></span>
                  <span className="txt">instagram</span>
              </a>
              <a className="btn" href="https://fb.com/ibserodio" target="_blank" rel="noopener noreferrer">
                  <span className="icon"><i className="fab fa-facebook-square"></i></span>
                  <span className="txt">facebook</span>
              </a>
              <a className="btn" href="https://anchor.fm/ibserodio" target="_blank" rel="noopener noreferrer">
                  <span className="icon"><i className="fa fa-microphone-alt"></i></span>
                  <span className="txt">sermões</span>
              </a>
              <a className="btn" href="#/historia">
                  <span className="icon"><i className="fas fa-church"></i></span>
                  <span className="txt">história</span>
              </a>
          </section>
          <section id="programacao">
              <h2>Programação Semanal</h2>
              <ul>
                { this.state.programacoes.map((programacao, i) =>
                  <li key={`programacao${i}`}>
                    <div className="data">
                      <span className="dia">{ programacao.dia }</span>
                      <span className="horario">{ programacao.horario }</span>
                    </div>
                    <div className="detalhes">
                      <span className="titulo">{ programacao.titulo }</span>
                      <span className="descricao">{ programacao.descricao }</span>
                    </div>
                  </li>
                ) }
              </ul>
          </section>
          {/* <section id="eventos">
              <h2>Próximos Eventos</h2>
              <div id="carrousel">
                { noticias.map((noticia, i) =>
                  <a className="noticia" href={`#/noticia/`+i} rel="noopener noreferrer" key={`noticia`+i}>
                    <div className="img" style={{ backgroundImage: `url('${noticia.imagem}')` }} alt={noticia.titulo}></div>
                    <div className="txt">
                      <span className="title">{noticia.titulo}</span>
                      <span className="subtitle">{noticia.descricao}</span>
                    </div>
                  </a>
                ) }
              </div>
          </section> */}
          {/* <section id="noticias">
              <h2>Últimas Notícias</h2>
              <div id="carrousel">
                { noticias.map((noticia, i) =>
                  <a className="noticia" href={`#/noticia/`+i} rel="noopener noreferrer" key={`noticia`+i}>
                    <div className="img" style={{ backgroundImage: `url('${noticia.imagem}')` }} alt={noticia.titulo}></div>
                    <div className="txt">
                      <span className="title">{noticia.titulo}</span>
                      <span className="subtitle">{noticia.descricao}</span>
                    </div>
                  </a>
                ) }
              </div>
              <a href="#noticias">Ver todas as notícias</a>
          </section> */}
          <section id="contatos">
            <div className="card">
              <h1>Igreja Batista em Cidade Serodio</h1>
              <a href="https://goo.gl/maps/kfd7wpaCJH2xWctKA" target="_blank" rel="noopener noreferrer">
                <i className="fa fa-map"></i>
                <span>Av. Delfinópolis, 491 - Cidade Seródio, Guarulhos - SP. CEP 07150-010</span>
              </a>
              <a href="https://api.whatsapp.com/send?phone=551124672355" target="_blank" rel="noopener noreferrer">
                <i className="fab fa-whatsapp"></i>
                <span>+55 (11) 2467-2355</span>
              </a>
              <a href="mailto:contato@ibserodio.com.br" target="_blank" rel="noopener noreferrer">
                <i className="fa fa-envelope"></i>
                <span>contato@ibserodio.com.br</span>
              </a>
            </div>
          </section>
      </div>
    );
  }
}
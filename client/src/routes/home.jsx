import React from 'react';
// import logo from './logo.svg';
import '../css/home.css';

// import {
//   HashRouter as Router,
//   Switch,
//   Route,
//   Link,
//   useRouteMatch,
//   useParams
// } from "react-router-dom";

export default function () {

  let noticias = [
    {
      titulo: 'Nossa Igreja comemora 35 anos com série de cultos festivos',
      imagem: 'imgs/initial_bkg.jpg',
      descricao: 'S'
    },
    {
      titulo: 'Nossa Igreja comemora 35 anos com série de cultos festivos',
      imagem: 'imgs/initial_bkg.jpg',
      descricao: 'S'
    },
    {
      titulo: 'Nossa Igreja comemora 35 anos com série de cultos festivos',
      imagem: 'imgs/initial_bkg.jpg',
      descricao: 'S'
    },
  ]

  return (
    <div className="page" id="home">
        <section id="hero">
            <h1>Igreja Batista em Cidade Serodio</h1>
        </section>
        <section id="donnations">
            <div>
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
            <a className="btn" href="#/">
                <span className="icon"><i className="fas fa-church"></i></span>
                <span className="txt">igreja</span>
            </a>
            <a className="btn" href="#/noticias">
                <span className="icon"><i className="fas fa-newspaper"></i></span>
                <span className="txt">notícias</span>
            </a>
            <a className="btn" href="https://youtube.com/ibserodio" target="_blank" rel="noopener noreferrer">
                <span className="icon"><i className="fas fa-video"></i></span>
                <span className="txt">Ao Vivo</span>
            </a>
            <a className="btn" href="https://bibliaonline.com.br" target="_blank" rel="noopener noreferrer">
                <span className="icon"><i className="fas fa-bible"></i></span>
                <span className="txt">bíblia</span>
            </a>
            <a className="btn" href="https://www.instagram.com/igrejabatistacidadeserodio/" target="_blank" rel="noopener noreferrer">
                <span className="icon"><i className="fab fa-instagram"></i></span>
                <span className="txt">instagram</span>
            </a>
            <a className="btn" href="https://fb.com/ibserodio" target="_blank" rel="noopener noreferrer">
                <span className="icon"><i className="fab fa-facebook"></i></span>
                <span className="txt">facebook</span>
            </a>
        </section>
        <section id="noticias">
            <h2>Programação Semanal</h2>
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
        </section>
        <section id="noticias">
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
        </section>
        <section id="noticias">
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
        </section>
    </div>
  );
}

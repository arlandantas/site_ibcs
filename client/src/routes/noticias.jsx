import React from 'react'
// import logo from './logo.svg'
import Navigation from '../components/navigation'
import '../css/noticias.css'

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
    <Navigation titulo="Notícias" id="noticias">
      <div id="lista">
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
    </Navigation>
  );
}
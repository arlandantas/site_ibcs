import React from 'react';
import '../css/navigation.css';

export default function (props) {
  return (
    <div className="page" id={props.id}>
      <nav className="nav-mobile">
        <button id="back" onClick={() => window.history.go(-1)}>
          <i className="fas fa-arrow-left"></i>
        </button>
        <h1>{props.titulo || 'IBCS'}</h1>
      </nav>
      <nav className="nav-desktop">
        <a id="logo" href="#/"><img src="imgs/logo_small.png" alt="IBCS"/></a>
        <div id="links">
          {/* <a href="#/">Home</a> */}
          {/* <a href="#/noticias">Notícias</a> */}
          <a href="#/igreja">Sobre</a>
          <a href="#/contribua">Contribua</a>
        </div>
      </nav>
      <section className="content">
        { !props.hideTitleDesktop ? (<h1 className="title_desktop">{props.titulo || 'IBCS'}</h1>) : '' }
        { props.children }
      </section>
    </div>
  );
}
import React from 'react';
// import logo from './logo.svg';
import '../css/navigation.css';

// import {
//   HashRouter as Router,
//   Switch,
//   Route,
//   Link,
//   useRouteMatch,
//   useParams
// } from "react-router-dom";

export default function (props) {
  return (
    <React.Fragment>
      <nav className="nav-mobile">
        <button id="back" onClick={() => window.history.go(-1)}>
          <i className="fas fa-arrow-left"></i>
        </button>
        <h1>{props.titulo || 'IBCS'}</h1>
      </nav>
      <nav className="nav-desktop">
        <a id="logo" href="#/">IBCS</a>
        <div id="links">
          <a href="#/">Home</a>
          <a href="#/noticias">Notícias</a>
        </div>
        <h1>{props.titulo || 'IBCS'}</h1>
      </nav>
    </React.Fragment>
  );
}
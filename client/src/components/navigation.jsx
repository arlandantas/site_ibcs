import React from 'react';
import '../css/navigation.css';
// import { useHistory } from "react-router-dom";

export default class Navigation extends React.Component {
  componentDidMount () {
    window.addEventListener('scroll', this.scrolling)
  }
  scrolling () {
    let elmt = document.querySelector('.page > .nav-mobile')
    if (elmt) {
      if (window.scrollY > 10 && elmt.className.indexOf('shadowed') === -1) {
        elmt.classList.add('shadowed')
      } else if (window.scrollY < 10 && elmt.className.indexOf('shadowed') > -1) {
        elmt.classList.remove('shadowed')
      }
    }
  }
  goBack () {
    // console.log('Done', window.location)
    if (document.referrer !== '')
      window.history.go(-1)
    else
      window.location.hash = '#/'
  }
  render () {
    return (
      <div className="page" id={this.props.id}>
        <nav className="nav-mobile">
          <button id="back" onClick={() => this.goBack()}>
            <i className="fas fa-arrow-left"></i>
          </button>
          <h1>{this.props.titulo || 'IBCS'}</h1>
        </nav>
        <nav className="nav-desktop">
          <a id="logo" href="#/"><img src="imgs/logo_dark.png" alt="IBCS"/></a>
          <div id="links">
            <a href="#/">Início</a>
            <a href="#/historia">Sobre</a>
            <a href="#/doacoes">Contribua</a>
          </div>
        </nav>
        <section className="content">
          { !this.props.hideTitleDesktop ? (<h1 className="title_desktop">{this.props.titulo || 'IBCS'}</h1>) : '' }
          { this.props.children }
        </section>
      </div>
    );
  }
}
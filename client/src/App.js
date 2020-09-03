import React from 'react';
import {
  HashRouter as Router,
  Switch,
  Route
} from "react-router-dom";
import axios from 'axios'
import ScrollToTop from './components/scrollToTop'

// Rotas
import Home from './routes/home';
import Noticias from './routes/noticias';
import Noticia from './routes/noticia';
import Historia from './routes/historia';
import Doacoes from './routes/doacoes';
import Contato from './routes/contato';

// axios.defaults.baseURL = process.env.NODE_ENV === 'development' ? 'http://localhost/' : window.location.origin+'/'
axios.defaults.baseURL = window.location.port === '8080' ? `http://${window.location.hostname}/` : `${window.location.origin}/`

if (!window.location.protocol.startsWith('https') && window.location.hostname !== 'localhost') {
  this.location.protocol = 'https:'
}

export default function () {
  return (
    <Router>
      <ScrollToTop />
      <div id="bkg"></div>
      <Switch>
        <Route path={["/historia"]} component={Historia} />
        <Route path={["/contato"]} component={Contato} />
        <Route path={["/doacoes"]} component={Doacoes} />
        <Route path={["/noticias"]} component={Noticias} />
        <Route path={["/noticia/:id"]} component={Noticia} />
        <Route path={['/', "/home"]} component={Home} />
      </Switch>
    </Router>
  );
}

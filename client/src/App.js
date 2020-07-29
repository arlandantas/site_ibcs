import React from 'react';
import {
  HashRouter as Router,
  Switch,
  Route
} from "react-router-dom";
import axios from 'axios'

// Rotas
import Home from './routes/home';
import Noticias from './routes/noticias';
import Noticia from './routes/noticia';
import Historia from './routes/historia';
import Doacoes from './routes/doacoes';

// axios.defaults.baseURL = process.env.NODE_ENV === 'development' ? 'http://localhost/' : window.location.origin+'/'
axios.defaults.baseURL = window.location.port === '8080' ? `http://${window.location.hostname}/` : `${window.location.origin}/`

export default function () {
  return (
    <Router>
      <div id="bkg"></div>
      <Switch>
        <Route path={["/historia"]} component={Historia} />
        <Route path={["/doacoes"]} component={Doacoes} />
        <Route path={["/noticias"]} component={Noticias} />
        <Route path={["/noticia/:id"]} component={Noticia} />
        <Route path={['/', "/home"]} component={Home} />
      </Switch>
    </Router>
  );
}

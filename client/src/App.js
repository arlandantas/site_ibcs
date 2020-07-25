import React from 'react';
import {
  HashRouter as Router,
  Switch,
  Route
} from "react-router-dom";

// Rotas
import Home from './routes/home';
import Noticias from './routes/noticias';
import Noticia from './routes/noticia';
import Igreja from './routes/igreja';

export default function () {
  return (
    <Router>
      <div id="bkg"></div>
      <Switch>
        <Route path={["/igreja"]} component={Igreja} />
        <Route path={["/noticias"]} component={Noticias} />
        <Route path={["/noticia/:id"]} component={Noticia} />
        <Route path={['/', "/home"]} component={Home} />
      </Switch>
    </Router>
  );
}

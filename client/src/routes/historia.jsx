import React from 'react'
import axios from 'axios'
import Navigation from '../components/navigation'
import '../css/historia.css'

class Historia extends React.Component {
  constructor (props) {
    super(props)
    this.state = {
      passos: [],
      loading: true
    }
  }
  componentDidMount () {
    axios.get('/historia')
      .then(({data}) => {
        this.setState({ passos: data, loading: false })
      })
  }
  toggle (i) {
    this.setState((state) => ({
      passos: state.passos.map((p, ii) => ({
        ...p,
        opened: ii !== i ? false : !p.opened
      }))
    }))
  }
  render () {
    return (
      <Navigation titulo={`Nossa IBCS...`} id="historia">
        { this.state.loading ? (<div id="loading">
            <i className="fas fa-spinner fa-pulse"></i>Carregando...
          </div>) : /*this.state.passos.map((p, i) => <PassoHistoria
          titulo={p.titulo} key={`passo-${i}`}
          onClick={ () => this.toggle(i) }
          opened={p.opened || false}
          conteudo={p.conteudo} />)*/
          
          this.state.passos.map((p, i) => (<div className={`passo ${ p.opened ? 'opened' : '' }`} key={`passo-${i}`}>
          { p.titulo ? (<h1 onClick={ () => this.toggle(i) }>{ p.titulo }</h1>) : '' }
          <div className="content" dangerouslySetInnerHTML={{ __html: p.conteudo }}></div>
        </div>))}
      </Navigation>
    );
  }
}

export default Historia
import React from 'react'
import Navigation from '../components/navigation'
import '../css/noticia.css'

class Noticia extends React.Component {
  constructor (props) {
    super(props)
    this.state = {
      carregando: true,
      id: props.match.params.id
    }
  }
  componentDidMount () {
    setTimeout(() => this.setState({ carregando: false }), 1000)
  }
  render () {
    return (
      <Navigation titulo={`Nossa IBCS`} id="igreja">
        Aqui vai a historia da igreja
      </Navigation>
    );
  }
}

export default Noticia
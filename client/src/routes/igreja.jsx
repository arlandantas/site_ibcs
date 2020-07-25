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
      <div className="page" id="noticia">
        <Navigation titulo={`IBCS`} />
        <section className="content">
          Aqui contaremos a história da igreja
        </section>
      </div>
    );
  }
}

export default Noticia
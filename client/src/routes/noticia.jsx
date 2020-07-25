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
      <Navigation titulo={`IBCS`} id="noticia" hideTitleDesktop>
        {
          this.state.carregando ?
          <div id="loading">
            <span onClick={ () => { this.setState({carregando: false}) } }>Carregando...</span>
          </div> :
          <React.Fragment>
            <h1 className="titulo">Apenas testando o título apenas testando o título do</h1>
            <span className="subtitulo">Testando conteúdo do subtítulo</span>
            <div className="corpo">
              <p>Quando o React vê um elemento representando um componente definido pelo usuário, ele passa atributos JSX e componentes filhos para esse componente como um único objeto. Nós chamamos esse objeto de “props”. </p>
              <p>Essa função é um componente React válido porque aceita um único argumento de objeto “props” (que significa propriedades) com dados e retorna um elemento React. Nós chamamos esses componentes de “componentes de função” porque são literalmente funções JavaScript.</p>
              <p>O React trata componentes começando com letras minúsculas como tags do DOM. Por exemplo, representa uma tag div do HTML, mas representa um componente e requer que Welcome esteja no escopo.</p>
            </div>
          </React.Fragment>
        }
      </Navigation>
    );
  }
}

export default Noticia
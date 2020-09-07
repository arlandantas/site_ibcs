import React from 'react'
import axios from 'axios';
import Navigation from '../components/navigation'
import '../css/contato.css'

class Contato extends React.Component {
  constructor (props) {
    super(props)
    this.state = {
      nome: '',
      contato: '',
      titulo: 'Quero ser membro',
      conteudo: '',
      enviando: false
    }
    this.handleInputChange = this.handleInputChange.bind(this);
    this.enviar = this.enviar.bind(this);
  }
  handleInputChange(event) {
    const target = event.target;
    const value = target.type === 'checkbox' ? target.checked : target.value;
    const name = target.name;
    this.setState({
      [name]: value
    });
  }
  enviar (e) {
    e.preventDefault()
    this.setState({ enviando: true })
    axios.post('/contato', {
      nome: this.state.nome,
      titulo: this.state.titulo,
      contato: this.state.contato,
      conteudo: this.state.conteudo,
    })
      .then(({ data }) => {
        alert("Recebemos sua mensagem!\nEm breve entraremos em contato!")
        this.setState({ conteudo: '', enviando: false })
      }).catch(e => {
        alert("Estamos com problemas!\nPor favor, tente novamente mais tarde!")
      })
  }
  render () {
    return (
      <Navigation titulo={`Fale Conosco`} id="contato">
        <form className="forma" id="transferencia">
          <div><b>Seu nome: </b> <input value={this.state.nome} onChange={this.handleInputChange} name="nome" /></div>
          <div><b>Seu contato: </b> <input value={this.state.contato} onChange={this.handleInputChange} name="contato" placeholder="Email ou Whatsapp" /></div>
          <div><b>Título: </b> <select value={this.state.titulo} onChange={this.handleInputChange} name="titulo">
            {['Quero ser membro', 'Sou visitante', 'O que achei da igreja', 'Outro assunto'].map(e => <option value={e} key={e}>{e}</option>)}
          </select></div>
          <div className="textarea"><b>Mensagem: </b> <textarea value={this.state.conteudo} onChange={this.handleInputChange} name="conteudo"></textarea></div>
          <button type="submit" className="button" onClick={this.enviar} disabled={this.state.enviando}>Enviar</button>
        </form>
      </Navigation>
    );
  }
}

export default Contato
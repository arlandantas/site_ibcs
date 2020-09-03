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
      titulo: '',
      conteudo: ''
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
    axios.post('/contato', this.state)
      .then(({ data }) => {
        alert("Recebemos sua mensagem!\nEm breve entraremos em contato com você!")
        this.setState({ conteudo: '' })
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
            <option>Quero ser membro</option>
            <option>Sou visitante</option>
            <option>O que achei da igreja</option>
            <option>Outro assunto</option>
          </select></div>
          <div className="textarea"><b>Mensagem: </b> <textarea value={this.state.conteudo} onChange={this.handleInputChange} name="conteudo"></textarea></div>
          <button type="submit" className="button" onClick={this.enviar}>Enviar</button>
        </form>
      </Navigation>
    );
  }
}

export default Contato
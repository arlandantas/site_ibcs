import React from 'react'
import Navigation from '../components/navigation'
import '../css/doacoes.css'

class CopyInput extends React.Component {
  constructor (props) {
    super(props)
    this.ref = React.createRef();
    this.state = { value: props.value }
  }
  copiar () {
    let field = this.ref.current
    field.select();
    field.setSelectionRange(0, 99999);
    document.execCommand("copy");
  }
  render () {
    return (
      <div className="copy-input">
        <input type="text" value={this.state.value} readOnly ref={this.ref}/>
        <i className="far fa-clone" onClick={() => this.copiar()}></i>
      </div>
    )
  }
}

class Doacoes extends React.Component {
  render () {
    return (
      <Navigation titulo={`Contribuições`} id="doacoes">
        <div id="formas">
          <div className="forma" id="transferencia">
            <h1>Transferência Bancária</h1>
            <div><CopyInput value="Igreja Batista em Cidade Seródio" /></div>
            <div><b>Banco: </b> <CopyInput value="237 - Bradesco" /></div>
            <div><b>Agência: </b> <CopyInput value="1231" /></div>
            <div><b>C/C: </b> <CopyInput value="68082-6" /></div>
            <div><b>CPNJ: </b> <CopyInput value="52.368.362/0001-33" /></div>
          </div>
          <div className="forma" id="whatsapp">
            <h1>Retirada a domicílio</h1>
            <div>Podemos fazer a retirada em sua casa, basta entrar em contato com a gente pelo whatsapp</div>
            <a href="https://api.whatsapp.com/send?phone=551124672355&text=Ol%C3%A1!%20Gostaria%20de%20agendar%20a%20retirada%20do%20meu%20d%C3%ADzimo%20e%20oferta%20para%20a%20IBCS%20na%20minha%20casa.%20" target="_blank" rel="noopener noreferrer">Clique Aqui <i className="fab fa-whatsapp fa-2x"></i></a>
          </div>
          <div className="forma" id="pagseguro">
            <div id="946863476114826055" align="center" className="wcustomhtml">
              <form action="https://pagseguro.uol.com.br/checkout/v2/donation.html" method="post">
                <input type="hidden" name="currency" value="BRL" />
                <input type="hidden" name="receiverEmail" value="ibserodio@gmail.com" />
                <input type="hidden" name="iot" value="button" />
                {/* <input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/doacoes/209x48-doar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" /> */}
                <input type="image" src="imgs/logo-pagseguro.png" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
                <button type="submit">Clique aqui e doe com cartão de crédito ou boleto bancário</button>
              </form>
            </div>
          </div>
          <div className="forma" id="picpay">
            <h1><img src="imgs/logo-picpay.png" alt="PicPay" /></h1>
            <a href="http://app.picpay.com/payment?type=store&sellerId=149943" target="_blank" rel="noopener noreferrer">Clique aqui ou escaneie o QR abaixo</a>
            <a href="http://app.picpay.com/payment?type=store&sellerId=149943" target="_blank" rel="noopener noreferrer">
              <img src="imgs/qr-picpay-dark.png" alt="QR PicPay" color="red" />
            </a>
          </div>
          <div className="forma" id="paypal">
            {/* <h1><img src="imgs/logo-picpay.png" alt="PicPay" /></h1>
            <a href="http://app.picpay.com/payment?type=store&sellerId=149943" target="_blank" rel="noopener noreferrer">Clique aqui ou escaneie o QR abaixo</a>
            <a href="http://app.picpay.com/payment?type=store&sellerId=149943" target="_blank" rel="noopener noreferrer">
              <img src="imgs/qr-picpay-dark.png" alt="QR PicPay" color="red" />
            </a> */}
            {/* <h1><img src="imgs/logo-paypal.png" alt="Paypal" /></h1> */}
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
              <input type="hidden" name="cmd" value="_s-xclick" />
              <input type="hidden" name="hosted_button_id" value="4LPY8X4XLCS4L" />
              <input type="image" src="imgs/logo-paypal.png" name="submit" alt="Doe com Paypal" />
              <button type="submit">Clique aqui e doe com cartão de crédito ou boleto bancário</button>
              {/* <input type="image" src="https://www.paypalobjects.com/pt_BR/BR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Faça doações com o botão do PayPal" /> */}
              {/* <img alt="" border="0" src="https://www.paypal.com/pt_BR/i/scr/pixel.gif" width="1" height="1" /> */}
            </form>
          </div>
        </div>
      </Navigation>
    );
  }
}

export default Doacoes
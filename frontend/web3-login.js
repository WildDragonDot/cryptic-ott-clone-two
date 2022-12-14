let userLoginData = {
  state: "loggedOut",
  ethAddress: "",
  buttonText: "Log in",
  publicName: "",
  JWT: "",
  config: { headers: { "Content-Type": "application/json" } }
}

if (typeof (backendPath) == 'undefined') {
  var backendPath = '';
}


// https://medium.com/valist/how-to-connect-web3-js-to-metamask-in-2020-fee2b2edf58a
const ethEnabled = async () => {
  if (window.ethereum) {
    await window.ethereum.send('eth_requestAccounts');
    window.web3 = new Web3(window.ethereum);
    // return true;
    ethInit();
  }
  return false;
}

function ethInit() {
  ethereum.on('accountsChanged', (_chainId) => ethNetworkUpdate());

  async function ethNetworkUpdate() {
    let accountsOnEnable = await web3.eth.getAccounts();
    let address = accountsOnEnable[0];
    address = address.toLowerCase();
    if (userLoginData.ethAddress != address) {
      userLoginData.ethAddress = address;
      showAddress();
      if (userLoginData.state == "loggedIn") {
        userLoginData.JWT = "";
        userLoginData.state = "loggedOut";
        userLoginData.buttonText = "Log in";
      }
    }
    if (userLoginData.ethAddress != null && userLoginData.state == "needLogInToMetaMask") {
      userLoginData.state = "loggedOut";
    }
  }
}


// Show current msg
function showMsg(id) {
  // console.log(id);
}


// Show current address
function showAddress() {
  // document.getElementById('ethAddress').innerHTML = userLoginData.ethAddress;
  setPublicName();
}


// Show current button text
function showButtonText() {
  var slides = document.getElementsByClassName("buttonText");
  for (var i = 0; i < slides.length; i++) {
    document.getElementsByClassName('buttonText')[i].innerHTML = userLoginData.buttonText;
  }
}


async function userLoginOut() {
  if (userLoginData.state == "loggedOut" || userLoginData.state == "needMetamask") {
    await onConnectLoadWeb3Modal();
  }
  if (web3ModalProv) {
    window.web3 = web3ModalProv;
    try {
      userLogin();
    } catch (error) {
      console.log(error);
      userLoginData.state = 'needLogInToMetaMask';
      showMsg(userLoginData.state);
      return;
    }
  }
  else {
    userLoginData.state = 'needMetamask';
    return;
  }
}


async function userLogin() {
  if (userLoginData.state == "loggedIn") {
    userLoginData.state = "loggedOut";
    showMsg(userLoginData.state);
    userLoginData.JWT = "";
    userLoginData.buttonText = "Log in";
    showButtonText();
    return;
  }
  if (typeof window.web3 === "undefined") {
    userLoginData.state = "needMetamask";
    showMsg(userLoginData.state);
    return;
  }
  if (window.ethereum.networkVersion) {
    await abcnew();
  }
  let accountsOnEnable = await web3.eth.getAccounts();
  let address = accountsOnEnable[0];
  address = address.toLowerCase();
  if (address == null) {
    userLoginData.state = "needLogInToMetaMask";
    showMsg(userLoginData.state);
    return;
  }
  userLoginData.state = "signTheMessage";
  showMsg(userLoginData.state);

  axios.post(
    backendPath + "backend/server.php",
    {
      request: "login",
      address: address
    },
    userLoginData.config
  )
    .then(function (response) {
      if (response.data.substring(0, 5) != "Error") {
        let message = response.data;
        let publicAddress = address;
        handleSignMessage(message, publicAddress).then(handleAuthenticate);

        function handleSignMessage(message, publicAddress) {
          return new Promise((resolve, reject) =>
            web3.eth.personal.sign(
              web3.utils.utf8ToHex(message),
              publicAddress,
              (err, signature) => {
                if (err) {
                  userLoginData.state = "loggedOut";
                  showMsg(userLoginData.state);
                }
                return resolve({ publicAddress, signature });
              }
            )
          );
        }

        function handleAuthenticate({ publicAddress, signature }) {
          axios
            .post(
              backendPath + "backend/server.php",
              {
                request: "auth",
                address: arguments[0].publicAddress,
                signature: arguments[0].signature
              },
              userLoginData.config
            )
            .then(function (response) {
              if (response.data[0] == "Success") {
                userLoginData.state = "loggedIn";
                showMsg(userLoginData.state);
                userLoginData.buttonText = "Log out";
                showButtonText();
                userLoginData.ethAddress = address;
                showAddress();
                userLoginData.publicName = response.data[1];
                // getPublicName();
                userLoginData.JWT = response.data[2];
                // Clear Web3 wallets data for logout
                localStorage.clear();
              }
            })
            .catch(function (error) {
              console.error(error);
            });
        }


      }
      else {
        console.log("Error: " + response.data);
      }
    })
    .catch(function (error) {
      console.error(error);
    });
}


function getPublicName() {
  document.getElementById('updatePublicName').value = userLoginData.publicName;
}


function setPublicName() {
  // let value = document.getElementById('updatePublicName').value;
  axios.post(
    backendPath + "backend/server.php",
    {
      request: "updatePublicName",
      address: userLoginData.ethAddress,
      JWT: userLoginData.JWT,
      // publicName: value
    },
    this.config
  )
    .then(function (response) {
      getLogin(userLoginData.ethAddress);
    })
    .catch(function (error) {
      console.error(error);
    });
}

const getLogin = async (loginUserAddress) => {
  $.ajax({
    type: 'POST',
    url: 'php/userAuthModal.php',
    'async': false,
    dataType: "json",
    data: {
      "user_address": loginUserAddress,
    },
    success: async function (data) {
      if (data.status == '201') {
        console.log("Success");
        await verifyAccessPass(loginUserAddress);
        await verifyPremiumPass(loginUserAddress);
      }
      window.location.reload();
    }
  });


}


//new code enter
async function abcnew() {
  const chainId = '4' // Ethereum Testnet
  // if (window.ethereum.networkVersion !== chainId) {
  //     try {
  //         await window.ethereum.request({
  //             method: 'wallet_switchEthereumChain',
  //             params: [{
  //                 chainId: '0x4'
  //             }],
  //         });
  //     } catch (err) {
  //         console.log(err);
  //     }
  // }
}
//new code end


// Chcek for Access Pass at the time of LOgin
const verifyAccessPass = async (loginUserAddress) => {
  const options = { method: 'GET' };
  // https://rarible.com/token/polygon/0xa2d9ded6115b7b7208459450d676f0127418ae7a:35330667205828808645805771972788148449949166894449166732923665699564597280769?tab=owners
  const blockChain = 'POLYGON';
  const tokenId = '0xa2d9ded6115b7b7208459450d676f0127418ae7a:35330667205828808645805771972788148449949166894449166732923665699564597280769';
  // const otherOption = 'continuation=POLYGON&size=1000';
  const otherOption = '';
  try {
    await fetch(`https://api.rarible.org/v0.1/ownerships/byItem?itemId=${blockChain}:${tokenId}&${otherOption}`, options)
      .then(response => response.json())
      .then(response => {
        const ownerships = response.ownerships;
        ownerships.map((value, key) => {
          const owner_address = value.owner;
          const owner_meta_address = owner_address.split("ETHEREUM:")[1];
          if (owner_meta_address === loginUserAddress) {
          // if (false) {
            $.ajax({
              type: 'POST',
              url: 'php/verifyAccessPass.php',
              'async': false,
              dataType: "json",
              data: {
                "user_address": loginUserAddress,
              },
              success: function (data) {
                if (data.status == '201') {
                  console.log("Access Pass verified");
                }
              }
            });
          }
          else{
            console.log("Access Pass Not verified");
          }
        });
      }).catch(err => console.error(err));
  }
  catch (err) { console.error(err); }
}

// Chcek for Premium Pass at the time of Login
const verifyPremiumPass = async (loginUserAddress) => {
  const options = { method: 'GET' };
  // https://rarible.com/token/polygon/0xa2d9ded6115b7b7208459450d676f0127418ae7a:35330667205828808645805771972788148449949166894449166732923665699564597280769?tab=owners
  // const blockChain = 'POLYGON';
  // const tokenId = '0xa2d9ded6115b7b7208459450d676f0127418ae7a:35330667205828808645805771972788148449949166894449166732923665699564597280769';
  // const otherOption = 'continuation=POLYGON&size=1000';
  // const otherOption = '';
  try {
    // await fetch(`https://api.rarible.org/v0.1/ownerships/byItem?itemId=${blockChain}:${tokenId}&${otherOption}`, options)
    await fetch(`https://rarible.com/token/polygon/0xa2d9ded6115b7b7208459450d676f0127418ae7a:35330667205828808645805771972788148449949166894449166732923665699564597280770?tab=owners`, options)
      .then(response => response.json())
      .then(response => {
        const ownerships = response.ownerships;
        ownerships.map((value, key) => {
          const owner_address = value.owner;
          const owner_meta_address = owner_address.split("ETHEREUM:")[1];
          if (owner_meta_address === loginUserAddress) {
          // if (false) {
            $.ajax({
              type: 'POST',
              url: 'php/verifyPremiumPass.php',
              'async': false,
              dataType: "json",
              data: {
                "user_address": loginUserAddress,
              },
              success: function (data) {
                if (data.status == '201') {
                  console.log("Premium Pass verified");
                }
              }
            });
          }
          else{
            console.log("Premium Pass Not verified");
          }
        });
      }).catch(err => console.error(err));
  }
  catch (err) { console.error(err); }
}
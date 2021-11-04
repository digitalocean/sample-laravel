@extends('app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-4 text-center">
            <div class="form-group">
                <h3>Enter amount here</h3>
                <input type="text" class="form-control" name="amount" id="inp_amount" aria-describedby="helpId"
                       placeholder="Enter amount in USDT">
            </div>
            <button type="button" onClick="startProcess()" class="btn btn-success">Pay now</button>
        </div>
    </div>
@endsection


<script>
    function startProcess() {
        if ($('#inp_amount').val() > 0) {
            EthAppDeploy.loadEthereum();
        } else {
            alert('Please Enter a valid amount');
        }
    }

    EthAppDeploy = {
        loadEthereum: async () => {
            if (typeof window.ethereum !== 'undefined') {
                EthAppDeploy.web3Provider = ethereum;
                EthAppDeploy.requestAccount(ethereum);
            } else {
                alert(
                    'Not able to locate an Ethereum connection, please install a Metamask wallet'
                )
            }
        },

        requestAccount: async(ethereum) => {
            ethereum
                .request({
                    method: 'eth_requestAccounts'
                })
                .then((resp) => {
                //    Do payments with activated account
                })
                .catch((err) => {
                    //Some unexpected error
                    console.log(err);
                })
        },

        payNow: async(ethereum, from) => {
            const amount = $('#inp_amount').val();
            ethereum
            .request({
                method: 'eth_sendTransaction',
                params: [{
                    from: from,
                    to: '0xd9AcbD460E8166aD27713eF86Ab0F3c08d17be09', // TODO: Account address, dus wordt token adres
                    value: '0x' + ((amount + 1000000000000000000).toString(16)),
                }, ],
            })
            .then((txHash) => {
                if (txHash) {
                    console.log(txHash); // Here we need to store the transaction
                } else {
                    console.log('Something went wrong, please try again');
                }
            })
            .catch((error) => {
                console.log(error);
            });
        },
    }
</script>

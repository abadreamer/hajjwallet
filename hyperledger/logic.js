/**
 * Hajj wallet trading network
 */


/**
 * Track the payment from hajj to merchant for buying a commodity
 * @param {com.Hajj.HajjWallet.PaymentTrx} paymentTrx - the payment to be processed
 * @transaction
 */
async function payForCommodity(paymentTrx){
    paymentTrx.payer.wallet.balance -=  paymentTrx.trxAmount
    let assetRegistryHjWallet = await getAssetRegistry('com.Hajj.HajjWallet.HjWallet');
    await assetRegistryHjWallet.update(paymentTrx.payer.wallet);
    paymentTrx.payee.wallet.balance +=  paymentTrx.trxAmount
    let assetRegistryMrchntWallet = await getAssetRegistry('com.Hajj.HajjWallet.MrchntWallet');
    await assetRegistryMrchntWallet.update(paymentTrx.payee.wallet);
}


/**
 * Track claims dome by merchants to collect thir money
 * @param {com.Hajj.HajjWallet.TopupTrx} topupTrx - Topup
 * @transaction
 */
async function topup(topupTrx) {
    topupTrx.payee.wallet.balance += topupTrx.trxAmount
    let assetRegistryHjjWallet = await getAssetRegistry('com.Hajj.HajjWallet.HjWallet');
    await assetRegistryHjjWallet.update(topupTrx.payee.wallet);
}


/**
 * Track claims dome by merchants to collect thir money
 * @param {com.Hajj.HajjWallet.ClaimTrx} claimTrx - Claim transaction to be processed
 * @transaction
 */
async function claimByMerchant(claimTrx) {
    claimTrx.payer.wallet.balance -= claimTrx.trxAmount
    let assetRegistryMrchntWallet = await getAssetRegistry('com.Hajj.HajjWallet.MrchntWallet');
    await assetRegistryMrchntWallet.update(claimTrx.payer.wallet);
}

/**
 * Perform actual money transfer to Merchant bank account
 * @param {com.Hajj.HajjWallet.ClaimTrx} claimTrx  - Claim transaction to be processed
 */
function transferMoney(claimTrx) {
//TODO: to be implemented
}
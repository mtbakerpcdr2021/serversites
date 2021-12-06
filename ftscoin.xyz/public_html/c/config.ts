let global: any = typeof window !== 'undefined' ? window : self;
global.config = {
	nodeList: [
		{ owner: "Unknown", node: "http://explorer.ftscoin.xyz:11898/getinfo"}
	],
	nodeUrl: "http://explorer.ftscoin.xyz:11898/getinfo",
	electionApiUrl: "www.example.com",
	websiteApiUrl: "ftscoin.xyz",
	mainnetExplorerUrl: "http://ftsexplorer.xyz/",
	mainnetExplorerUrlHash: "http://ftsexplorer.xyz/?hash={ID}#blockchain_transaction",
	mainnetExplorerUrlBlock: "http://ftsexplorer.xyz/?hash={ID}#blockchain_block",
	testnetExplorerUrl: "www.example.testnet.org",
	testnetExplorerUrlHash: "www.example.testnet.org",
	testnetExplorerUrlBlock: "www.example.testnet.org",
	testnet: false,
	coinUnitPlaces: 8,
	coinDisplayUnitPlaces: 2,
	txMinConfirms: 10,
	txCoinbaseMinConfirms: 10,
	addressPrefix: 1967208,
	integratedAddressPrefix: 0x148201,
	addressPrefixTestnet: 0x14820c,
	integratedAddressPrefixTestnet: 0x148201,
	subAddressPrefix: 0x148202,
	subAddressPrefixTestnet: 0x148202,
	coinFee: new JSBigInt('10000'),
	feePerKB: new JSBigInt('10000'),
	dustThreshold: new JSBigInt('10000'), //used for choosing outputs/change - we decompose all the way down if the receiver wants now regardless of threshold
	defaultMixin: 3, // default value mixin

	idleTimeout: 30,
	idleWarningDuration: 20,

	coinSymbol: 'FTS',
	openAliasPrefix: "fts",
	coinName: 'FTScoin',
	coinUriPrefix: 'ftscoin:',
	avgBlockTime: 120,
	maxBlockNumber: 500000000,
	remoteNodeFee: 0.1,
	devFee: 1,
	devAddress: ""
};

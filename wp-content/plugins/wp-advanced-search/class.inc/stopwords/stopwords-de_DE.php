<?php
$stopwords = array("ab","bei","da","deshalb","ein","für","haben","hier","ich","ja","kann","machen","muesste","nach","oder","seid","sonst","und","vom","wann","wenn","wie","zu","bin","eines","hat","manche","solches","an","anderm","bis","das","deinem","demselben","dir","doch","einig","er","eurer","hatte","ihnen","ihre","ins","jenen","keinen","manchem","meinen","nichts","seine","soll","unserm","welche","werden","wollte","während","alle","allem","allen","aller","alles","als","also","am","ander","andere","anderem","anderen","anderer","anderes","andern","anderr","anders","auch","auf","aus","bist",
"bsp.",
"daher",
"damit",
"dann",
"dasselbe",
"dazu",
"daß",
"dein",
"deine",
"deinen",
"deiner",
"deines",
"dem",
"den",
"denn",
"denselben",
"der",
"derer",
"derselbe",
"derselben",
"des",
"desselben",
"dessen",
"dich",
"die",
"dies",
"diese",
"dieselbe",
"dieselben",
"diesem",
"diesen",
"dieser",
"dieses",
"dort",
"du",
"durch",
"eine",
"einem",
"einen",
"einer",
"einige",
"einigem",
"einigen",
"einiger",
"einiges",
"einmal",
"es",
"etwas",
"euch",
"euer",
"eure",
"eurem",
"euren",
"eures",
"ganz",
"ganze",
"ganzen",
"ganzer",
"ganzes",
"gegen",
"gemacht",
"gesagt",
"gesehen",
"gewesen",
"gewollt",
"hab",
"habe",
"hatten",
"hin",
"hinter",
"ihm",
"ihn",
"ihr",
"ihrem",
"ihren",
"ihrer",
"ihres",
"im",
"in",
"indem",
"ist",
"jede",
"jedem",
"jeden",
"jeder",
"jedes",
"jene",
"jenem",
"jener",
"jenes",
"jetzt",
"kein",
"keine",
"keinem",
"keiner",
"keines",
"konnte",
"können",
"könnte",
"mache",
"machst",
"macht",
"machte",
"machten",
"man",
"manchen",
"mancher",
"manches",
"mein",
"meine",
"meinem",
"meiner",
"meines",
"mich",
"mir",
"mit",
"muss",
"musste",
"müßt",
"nicht",
"noch",
"nun",
"nur",
"ob",
"ohne",
"sage",
"sagen",
"sagt",
"sagte",
"sagten",
"sagtest",
"sehe",
"sehen",
"sehr",
"seht",
"sein",
"seinem",
"seinen",
"seiner",
"seines",
"selbst",
"sich",
"sicher",
"sie",
"sind",
"so",
"solche",
"solchem",
"solchen",
"solcher",
"sollte",
"sondern",
"um",
"uns",
"unse",
"unsen",
"unser",
"unses",
"unter",
"viel",
"von",
"vor",
"war",
"waren",
"warst",
"was",
"weg",
"weil",
"weiter",
"welchem",
"welchen",
"welcher",
"welches",
"werde",
"wieder",
"will",
"wir",
"wird",
"wirst",
"wo",
"wolle",
"wollen",
"wollt",
"wollten",
"wolltest",
"wolltet",
"würde",
"würden",
"z.B.",
"zum",
"zur",
"zwar",
"zwischen",
"über",
"aber",
"abgerufen",
"abgerufene",
"abgerufener",
"abgerufenes",
"acht",
"acute",
"allein",
"allerdings",
"allerlei",
"allg",
"allgemein",
"allmählich",
"allzu",
"alsbald",
"amp",
"and",
"andererseits",
"andernfalls",
"anerkannt",
"anerkannte",
"anerkannter",
"anerkanntes",
"anfangen",
"anfing",
"angefangen",
"angesetze",
"angesetzt",
"angesetzten",
"angesetzter",
"ansetzen",
"anstatt",
"arbeiten",
"aufgehört",
"aufgrund",
"aufhören",
"aufhörte",
"aufzusuchen",
"ausdrücken",
"ausdrückt",
"ausdrückte",
"ausgenommen",
"ausser",
"ausserdem",
"author",
"autor",
"außen",
"außer",
"außerdem",
"außerhalb",
"background",
"bald",
"bearbeite",
"bearbeiten",
"bearbeitete",
"bearbeiteten",
"bedarf",
"bedurfte",
"bedürfen",
"been",
"befragen",
"befragte",
"befragten",
"befragter",
"begann",
"beginnen",
"begonnen",
"behalten",
"behielt",
"beide",
"beiden",
"beiderlei",
"beides",
"beim",
"beinahe",
"beitragen",
"beitrugen",
"bekannt",
"bekannte",
"bekannter",
"bekennen",
"benutzt",
"bereits",
"berichten",
"berichtet",
"berichtete",
"berichteten",
"besonders",
"besser",
"bestehen",
"besteht",
"beträchtlich",
"bevor",
"bezüglich",
"bietet",
"bisher",
"bislang",
"biz",
"bleiben",
"blieb",
"bloss",
"bloß",
"border",
"brachte",
"brachten",
"brauchen",
"braucht",
"bringen",
"bräuchte",
"bzw",
"böden",
"ca",
"ca.",
"collapsed",
"com",
"comment",
"content",
"da?",
"dabei",
"dadurch",
"dafür",
"dagegen",
"dahin",
"damals",
"danach",
"daneben",
"dank",
"danke",
"danken",
"dannen",
"daran",
"darauf",
"daraus",
"darf",
"darfst",
"darin",
"darum",
"darunter",
"darüber",
"darüberhinaus",
"dass",
"davon",
"davor",
"demnach",
"denen",
"dennoch",
"derart",
"derartig",
"derem",
"deren",
"derjenige",
"derjenigen",
"derzeit",
"desto",
"deswegen",
"diejenige",
"diesseits",
"dinge",
"direkt",
"direkte",
"direkten",
"direkter",
"doc",
"doppelt",
"dorther",
"dorthin",
"drauf",
"drei",
"dreißig",
"drin",
"dritte",
"drunter",
"drüber",
"dunklen",
"durchaus",
"durfte",
"durften",
"dürfen",
"dürfte",
"eben",
"ebenfalls",
"ebenso",
"ehe",
"eher",
"eigenen",
"eigenes",
"eigentlich",
"einbaün",
"einerseits",
"einfach",
"einführen",
"einführte",
"einführten",
"eingesetzt",
"einigermaßen",
"eins",
"einseitig",
"einseitige",
"einseitigen",
"einseitiger",
"einst",
"einstmals",
"einzig",
"elf",
"ende",
"entsprechend",
"entweder",
"ergänze",
"ergänzen",
"ergänzte",
"ergänzten",
"erhalten",
"erhielt",
"erhielten",
"erhält",
"erneut",
"erst",
"erste",
"ersten",
"erster",
"eröffne",
"eröffnen",
"eröffnet",
"eröffnete",
"eröffnetes",
"etc",
"etliche",
"etwa",
"fall",
"falls",
"fand",
"fast",
"ferner",
"finden",
"findest",
"findet",
"folgende",
"folgenden",
"folgender",
"folgendes",
"folglich",
"for",
"fordern",
"fordert",
"forderte",
"forderten",
"fortsetzen",
"fortsetzt",
"fortsetzte",
"fortsetzten",
"fragte",
"frau",
"frei",
"freie",
"freier",
"freies",
"fuer",
"fünf",
"gab",
"ganzem",
"gar",
"gbr",
"geb",
"geben",
"geblieben",
"gebracht",
"gedurft",
"geehrt",
"geehrte",
"geehrten",
"geehrter",
"gefallen",
"gefiel",
"gefälligst",
"gefällt",
"gegeben",
"gehabt",
"gehen",
"geht",
"gekommen",
"gekonnt",
"gemocht",
"gemäss",
"genommen",
"genug",
"gern",
"gestern",
"gestrige",
"getan",
"geteilt",
"geteilte",
"getragen",
"gewissermaßen",
"geworden",
"ggf",
"gib",
"gibt",
"gleich",
"gleichwohl",
"gleichzeitig",
"glücklicherweise",
"gmbh",
"gratulieren",
"gratuliert",
"gratulierte",
"gute",
"guten",
"gängig",
"gängige",
"gängigen",
"gängiger",
"gängiges",
"gänzlich",
"haette",
"halb",
"hallo",
"hast",
"hattest",
"hattet",
"heraus",
"herein",
"heute",
"heutige",
"hiermit",
"hiesige",
"hinein",
"hinten",
"hinterher",
"hoch",
"html",
"http",
"hundert",
"hätt",
"hätte",
"hätten",
"höchstens",
"igitt",
"image",
"immer",
"immerhin",
"important",
"indessen",
"info",
"infolge",
"innen",
"innerhalb",
"insofern",
"inzwischen",
"irgend",
"irgendeine",
"irgendwas",
"irgendwen",
"irgendwer",
"irgendwie",
"irgendwo",
"je",
"jed",
"jedenfalls",
"jederlei",
"jedoch",
"jemand",
"jenseits",
"jährig",
"jährige",
"jährigen",
"jähriges",
"kam",
"kannst",
"kaum",
"kei nes",
"keinerlei",
"keineswegs",
"klar",
"klare",
"klaren",
"klares",
"klein",
"kleinen",
"kleiner",
"kleines",
"koennen",
"koennt",
"koennte",
"koennten",
"komme",
"kommen",
"kommt",
"konkret",
"konkrete",
"konkreten",
"konkreter",
"konkretes",
"konnten",
"könn",
"könnt",
"könnten",
"künftig",
"lag",
"lagen",
"langsam",
"lassen",
"laut",
"lediglich",
"leer",
"legen",
"legte",
"legten",
"leicht",
"leider",
"lesen",
"letze",
"letzten",
"letztendlich",
"letztens",
"letztes",
"letztlich",
"lichten",
"liegt",
"liest",
"links",
"längst",
"längstens",
"mag",
"magst",
"mal",
"mancherorts",
"manchmal",
"mann",
"margin",
"med",
"mehr",
"mehrere",
"meist",
"meiste",
"meisten",
"meta",
"mindestens",
"mithin",
"mochte",
"morgen",
"morgige",
"muessen",
"muesst",
"musst",
"mussten",
"muß",
"mußt",
"möchte",
"möchten",
"möchtest",
"mögen",
"möglich",
"mögliche",
"möglichen",
"möglicher",
"möglicherweise",
"müssen",
"müsste",
"müssten",
"müßte",
"nachdem",
"nacher",
"nachhinein",
"nahm",
"natürlich",
"ncht",
"neben",
"nebenan",
"nehmen",
"nein",
"neu",
"neue",
"neuem",
"neuen",
"neuer",
"neues",
"neun",
"nie",
"niemals",
"niemand",
"nimm",
"nimmer",
"nimmt",
"nirgends",
"nirgendwo",
"nter",
"nutzen",
"nutzt",
"nutzung",
"nächste",
"nämlich",
"nötigenfalls",
"nützt",
"oben",
"oberhalb",
"obgleich",
"obschon",
"obwohl",
"oft",
"online",
"org",
"padding",
"per",
"pfui",
"plötzlich",
"pro",
"reagiere",
"reagieren",
"reagiert",
"reagierte",
"rechts",
"regelmäßig",
"rief",
"rund",
"sang",
"sangen",
"schlechter",
"schließlich",
"schnell",
"schon",
"schreibe",
"schreiben",
"schreibens",
"schreiber",
"schwierig",
"schätzen",
"schätzt",
"schätzte",
"schätzten",
"sechs",
"sect",
"sehrwohl",
"sei",
"seit",
"seitdem",
"seite",
"seiten",
"seither",
"selber",
"senke",
"senken",
"senkt",
"senkte",
"senkten",
"setzen",
"setzt",
"setzte",
"setzten",
"sicherlich",
"sieben",
"siebte",
"siehe",
"sieht",
"singen",
"singt",
"sobald",
"sodaß",
"soeben",
"sofern",
"sofort",
"sog",
"sogar",
"solange",
"solc hen",
"solch",
"sollen",
"sollst",
"sollt",
"sollten",
"solltest",
"somit",
"sonstwo",
"sooft",
"soviel",
"soweit",
"sowie",
"sowohl",
"spielen",
"später",
"startet",
"startete",
"starteten",
"statt",
"stattdessen",
"steht",
"steige",
"steigen",
"steigt",
"stets",
"stieg",
"stiegen",
"such",
"suchen",
"sämtliche",
"tages",
"tat",
"tatsächlich",
"tatsächlichen",
"tatsächlicher",
"tatsächliches",
"tausend",
"teile",
"teilen",
"teilte",
"teilten",
"titel",
"total",
"trage",
"tragen",
"trotzdem",
"trug",
"trägt",
"tun",
"tust",
"tut",
"txt",
"tät",
"ueber",
"umso",
"unbedingt",
"ungefähr",
"unmöglich",
"unmögliche",
"unmöglichen",
"unmöglicher",
"unnötig",
"unsem",
"unser",
"unsere",
"unserem",
"unseren",
"unserer",
"unseres",
"unten",
"unterbrach",
"unterbrechen",
"unterhalb",
"unwichtig",
"usw",
"var",
"vergangen",
"vergangene",
"vergangener",
"vergangenes",
"vermag",
"vermutlich",
"vermögen",
"verrate",
"verraten",
"verriet",
"verrieten",
"version",
"versorge",
"versorgen",
"versorgt",
"versorgte",
"versorgten",
"versorgtes",
"veröffentlichen",
"veröffentlicher",
"veröffentlicht",
"veröffentlichte",
"veröffentlichten",
"veröffentlichtes",
"viele",
"vielen",
"vieler",
"vieles",
"vielleicht",
"vielmals",
"vier",
"vollständig",
"voran",
"vorbei",
"vorgestern",
"vorher",
"vorne",
"vorüber",
"völlig",
"während",
"wachen",
"waere",
"warum",
"weder",
"wegen",
"weitere",
"weiterem",
"weiteren",
"weiterer",
"weiteres",
"weiterhin",
"weiß",
"wem",
"wen",
"wenig",
"wenige",
"weniger",
"wenigstens",
"wenngleich",
"wer",
"werdet",
"weshalb",
"wessen",
"wichtig",
"wieso",
"wieviel",
"wiewohl",
"willst",
"wirklich",
"wodurch",
"wogegen",
"woher",
"wohin",
"wohingegen",
"wohl",
"wohlweislich",
"womit",
"woraufhin",
"woraus",
"worin",
"wurde",
"wurden",
"währenddessen",
"wär",
"wäre",
"wären",
"zahlreich",
"zehn",
"zeitweise",
"ziehen",
"zieht",
"zog",
"zogen",
"zudem",
"zuerst",
"zufolge",
"zugleich",
"zuletzt",
"zumal",
"zurück",
"zusammen",
"zuviel",
"zwanzig",
"zwei",
"zwölf",
"ähnlich",
"übel",
"überall",
"überallhin",
"überdies",
"übermorgen",
"übrig",
"übrigens"
);
?>
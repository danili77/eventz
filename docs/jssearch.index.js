jssearch.index = {"proyecto":[{"f":1,"w":2.28}],"integrado":[{"f":1,"w":1.9}],"&para":[{"f":1,"w":1.9}],"gu\u00eda":[{"f":1,"w":4}],"de":[{"f":1,"w":4.8}],"eventz":[{"f":1,"w":4}],"este":[{"f":1,"w":1.2}],"es":[{"f":1,"w":1.2}],"el":[{"f":1,"w":1.44}],"documento":[{"f":1,"w":1.2}],"que":[{"f":1,"w":1.2}],"explica":[{"f":1,"w":1.2}],"qu\u00e9":[{"f":1,"w":1.2}],"va":[{"f":1,"w":1.2}],"bla":[{"f":1,"w":1.728}],"class":[{"f":1,"w":1.2}],"reference":[{"f":1,"w":1.2}],"guide":[{"f":1,"w":1.2}],"results":[{"f":1,"w":1.2}],"'":[{"f":1,"w":1.44}],"+":[{"f":1,"w":2.48832}],"result":[{"f":1,"w":1.44}],"key":[{"f":1,"w":1.44}],"file":[{"f":1,"w":1.44}],"t":[{"f":1,"w":1.2}],"''":[{"f":1,"w":1.44}],"d":[{"f":1,"w":1.2}]};
jssearch.files = {"1":{"u":".\/\/README.html","t":"Proyecto Integrado ","d":"Este es el documento que explica de qu\u00e9 va el proyecto bla bla bla..."}};
jssearch.tokenizeString = function(string) {
		var stopWords = ["a","an","and","are","as","at","be","but","by","for","if","in","into","is","it","no","not","of","on","or","such","that","the","their","then","there","these","they","this","to","was","will","with","yii"];
		return string.split(/[\s\.,;\:\\\/\[\]\(\)\{\}]+/).map(function(val) {
			return val.toLowerCase();
		}).filter(function(val) {
			for (w in stopWords) {
				if (stopWords[w] == val) return false;
			}
			return true;
		}).map(function(word) {
			return {t: word, w: 1};
		});
};
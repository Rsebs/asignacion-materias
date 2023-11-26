import axios from "axios";

export async function getApi(url, method, data = {}) {
	try {
		const res = await axios({
			method: method,
			url: url,
			data: data
		});

		if (res.status === 200) {
			return res;
		}
	} catch (error) {
		console.error('Error con la petición: ', error);
	}
}
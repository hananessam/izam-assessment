const GetProducts = async () => {
    const token = localStorage.getItem("token");
    const response = await fetch('/api/products', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'Authorization': `Bearer ${token}`,
        },
    });

    return {
        status: response.status,
        data: await response.json(),
    };
};

export default GetProducts;

class Errors {
    errors = {};

    /**
     * Returns all errors from specified array
     *
     * @param inputName
     * @returns {string}
     */
    displayErrors(inputName = '') {
        if (inputName === '') {
            console.error('InputName not specified');
        }

        if (this.errors[inputName] === undefined) {
            console.error('Inccorect inputName');
        }

        let errorsStr = '';

        this.errors[inputName].forEach(error => {
            errorsStr += error + '\n';
        })

        return errorsStr;
    }
}

export default Errors;
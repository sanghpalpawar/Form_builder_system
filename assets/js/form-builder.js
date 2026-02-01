let fields = [];

function addField() {
    let i = fields.length;

    fields.push({
        label: "",
        type: "text",
        required: false
    });
    


    document.getElementById("fields").innerHTML += `
        <div class="field-box">
            <input placeholder="Label"
              onchange="updateField(${i}, 'label', this.value)">

            <select onchange="updateField(${i}, 'type', this.value)">
                <option value="text">Text</option>
                <option value="number">Number</option>
                <option value="email">Email</option>
                <option value="tel">Phone</option>
                <option value="gender">Gender</option>
            </select>

            <label>
                Required
                <input type="checkbox"
                 onchange="updateField(${i}, 'required', this.checked)">
            </label>
        </div>`;
}

function updateField(i, key, value) {
    fields[i][key] = value;
    document.getElementById("structure_json").value =
        JSON.stringify(fields);
}

function validateForm() {
    return true;
}

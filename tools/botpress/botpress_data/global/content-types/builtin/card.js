//CHECKSUM:84c41d34a8e3e6d8b2cbfcd73580c08543a4b261c77792b1f51036e583861722
const base = require('./_base')
const ActionButton = require('./action_button')
const utils = require('./_utils')

const Card = {
  id: 'builtin_card',
  group: 'Built-in Messages',
  title: 'card',

  jsonSchema: {
    description: 'module.builtin.types.card.description',
    type: 'object',
    required: ['title'],
    properties: {
      title: {
        type: 'string',
        title: 'title'
      },
      subtitle: {
        type: 'string',
        title: 'subtitle'
      },
      image: {
        type: 'string',
        $subtype: 'image',
        $filter: '.jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*',
        title: 'image'
      },
      actions: {
        type: 'array',
        title: 'module.builtin.actionButton',
        items: ActionButton.jsonSchema
      },
      ...base.useMarkdown
    }
  },

  uiSchema: {},

  computePreviewText: formData => formData.title && `Card: ${formData.title}`,
  renderElement: (data, channel) => {
    return utils.extractPayload('card', data)
  }
}

Card.jsonSchema.properties.markdown.default = false

module.exports = Card

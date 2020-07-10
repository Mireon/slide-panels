/**
 * The selector of root.
 *
 * @type string
 */
const root = '[id="slide-panels"]';

/**
 * The tool to selecting DOM elements of this plugin.
 */
export default class Selector {
    /**
     * Returns the root.
     *
     * @type Element
     */
    public static body(): Element {
        return document.querySelector('body');
    }

    /**
     * Returns the list of levers.
     *
     * @type NodeListOf<Element>
     */
    public static levers(): NodeListOf<Element> {
        const attribute = '[data-element="lever"]';

        return document.querySelectorAll(attribute);
    }

    /**
     * Returns the root.
     *
     * @type Element
     */
    public static root(): Element {
        return document.querySelector(root);
    }

    /**
     * Returns the backstage.
     *
     * @type Element
     */
    public static backstage(): Element {
        const attribute = '[data-element="backstage"]';

        return document.querySelector(`${root} ${attribute}`);
    }

    /**
     * Returns the list of panels.
     *
     * @type NodeListOf<Element>
     */
    public static panels(): NodeListOf<Element> {
        const attribute = '[data-element="panel"]';

        return document.querySelectorAll(`${root} ${attribute}`);
    }

    /**
     * Returns the panel selected by key.
     *
     * @param panelKey { string }
     *   A panel key.
     *
     * @type Element
     */
    public static panel(panelKey: string): Element {
        const attribute = `[data-element="panel"][data-key="${panelKey}"]`;

        return document.querySelector(`${root} ${attribute}`);
    }
}
